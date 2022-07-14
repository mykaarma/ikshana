import mysql.connector
db = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="alerting"
)
cursor = db.cursor()
data=""
with open('slow.txt','r') as file:
  data=file.read()
data=data.split('\n')[1:]
res=[]
for i in data:
  row=i.strip().split(' ')
  
  res.append((row[0],row[-1]))
query = "INSERT INTO slowquery(user,count) VALUES (%s,%s)"
cursor.executemany(query, res)
db.commit()