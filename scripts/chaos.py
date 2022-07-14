import requests
import json
import csv
import pandas as pd
import mysql.connector
import command
import sys
db = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="alerting"
)
def application():
	url = 'https://app.mykaarma.com'
	fh = open('output-app.csv', 'w')
	csv_writer = csv.writer(fh)
	csv_writer.writerow(["url", "status"])
	for i in range(6):
		
		r = requests.get(url, verify=True, timeout=3)
		csv_writer.writerow([url,r.status_code])
	fh.close()
	cursor = db.cursor()

	data = pd.read_csv (r'output-app.csv')   
	df = pd.DataFrame(data)
	df = df.astype(object).where(pd.notnull(df), None)
	for row in df.itertuples():
	  query = "INSERT INTO chaos(testname,url,status) VALUES (%s,%s,%s)"
	  data = ("application",row.url,row.status)
	  cursor.execute(query, data)
	db.commit()
	print(cursor.rowcount, "record inserted.")
def albstatus():
	url = 'https://api.mykaarma.com'
	fh = open('output-alb.csv', 'w')
	csv_writer = csv.writer(fh)
	csv_writer.writerow(["url", "status"])
	for i in range(6):
		
		r = requests.get(url, verify=True, timeout=3)
		csv_writer.writerow([url,r.status_code])
	fh.close()
	cursor = db.cursor()

	data = pd.read_csv (r'output-alb.csv')   
	df = pd.DataFrame(data)
	df = df.astype(object).where(pd.notnull(df), None)
	for row in df.itertuples():
	  query = "INSERT INTO chaos(testname,url,status) VALUES (%s,%s,%s)"
	  data = ("alb-test",row.url,row.status)
	  cursor.execute(query, data)
	db.commit()
	print(cursor.rowcount, "record inserted.")
def eks_node():
	url=['http://nlb-scheduler.mykaarma.com/appointment/actuator/health','http://nlb-scheduler.mykaarma.com/appointment-opcode-aggregator/actuator/health','http://nlb-scheduler.mykaarma.com/scheduler-pickupdelivery-aggregator/actuator/health','http://nlb-scheduler.mykaarma.com/email-to-appointment/actuator/health','http://loaneruser:p%4055w0rd%40123@nlb-scheduler.mykaarma.com/loaner/actuator/health','http://vmiuser:p%4055w0rd%40123@nlb-scheduler.mykaarma.com/vmi/health','http://nlb-scheduler.mykaarma.com/recall/actuator/health','http://nlb-scheduler.mykaarma.com/calendar/actuator/health','http://nlb-scheduler.mykaarma.com/vindecoder/actuator/health','http://nlb-scheduler.mykaarma.com/schedulerrouter/actuator/health']
	url2=['http://nlb-scheduler.mykaarma.com/web-scheduler-ui-client/health','http://nlb-scheduler.mykaarma.com/kappointment-ui-client/health','http://nlb-scheduler.mykaarma.com/customer-app/health']
	fh = open('output.csv', 'w')
	csv_writer = csv.writer(fh)
	csv_writer.writerow(["url", "status"])
	for i in url:
		print(i)
		r = requests.get(i).json()['status']
		csv_writer.writerow([i,r])
	for i in url2:
		print(i)
		r=requests.get(i)
		csv_writer.writerow([i,r])
	fh.close()
	cursor = db.cursor()

	data = pd.read_csv (r'output.csv')   
	df = pd.DataFrame(data)
	df = df.astype(object).where(pd.notnull(df), None)
	for row in df.itertuples():
	  query = "INSERT INTO chaos(testname,url,status) VALUES (%s,%s,%s)"
	  data = ("eks_node",row.url,row.status)
	  cursor.execute(query, data)
	db.commit()
	print(cursor.rowcount, "record inserted.")
if sys.argv[1] == "test1":
	application()
if sys.argv[1] == "test2":
	albstatus()
if sys.argv[1] == "test3":
	eks_node()
