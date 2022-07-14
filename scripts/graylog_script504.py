import mysql.connector
import csv
import pandas as pd


db = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="alerting"
)
cursor = db.cursor()

data = pd.read_csv (r'504alerts.csv')   
df = pd.DataFrame(data)
df = df.astype(object).where(pd.notnull(df), None)
df["timestamp"] = pd.to_datetime(df["timestamp"], format="%Y-%m-%dT%H:%M:%S.%fZ")
for row in df.itertuples():
  query = "INSERT INTO errors504(timestamp,backend,source,url) VALUES (%s, %s, %s, %s)"
  data = (row.timestamp,row.ha_chosen_backend,row.source,row.requested_url)
  cursor.execute(query, data)
db.commit()
print(cursor.rowcount, "record inserted.")
data = pd.read_csv (r'500alerts.csv')   
df = pd.DataFrame(data)
df = df.astype(object).where(pd.notnull(df), None)
df["timestamp"] = pd.to_datetime(df["timestamp"], format="%Y-%m-%dT%H:%M:%S.%fZ")
for row in df.itertuples():
  query = "INSERT INTO errors500(timestamp,backend,source,url) VALUES (%s, %s, %s, %s)"
  data = (row.timestamp,row.ha_chosen_backend,row.source,row.requested_url)
  cursor.execute(query, data)
db.commit()
print(cursor.rowcount, "record inserted.")
