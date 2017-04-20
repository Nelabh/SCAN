import csv

def main():
  f=open("Book1.csv",'rb')
  rd=csv.reader(f)
  for row in rd:
          if(row[0]=='e'):
            print (row[1])
  f.close()
