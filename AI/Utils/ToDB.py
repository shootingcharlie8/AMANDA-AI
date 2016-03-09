import MySQLdb
import sys

db = MySQLdb.connect("127.0.0.1", "localuser", "LocalPass", "amanda")
cursor = db.cursor()
with open("script.txt") as f:
    content = f.readlines()
numoflines = (len(content))
print(numoflines)
i = 0
o = 0
found = 'False'
while (o<numoflines):
    #print(content[i][0])
    responses = []

    if (content[i][0] == "K"):
        keyword = content[i].replace("K", "", 1)
        print keyword
        while (content[i] != "#\n"):
            i=i+1
            #responses.append(content[i])
            # TODO: write code...
            # = o+1

            #found = 'True'
            #print(content[i])
            #i = i+1
            text = content[i].replace("R", "", 1)
            #if content[i][0] != 'C':
                #print "found context"
                # TODO: write code...
            if ((content[i] != '#\n') and (content[i][0] != 'C')):
                print i
                cursor.execute("INSERT INTO `amanda` (`EntryNum`, `Keyword`, `Response`, `Context`) VALUES (NULL, %s, %s, '') ", (keyword, text))
                db.commit()
            #cur.execute()
            #cur.commit()
    else:
        i=i+1
    o=o+1

#ver = cur.fetchone()

#print "Database version : %s " % ver