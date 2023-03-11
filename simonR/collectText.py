import csv

with open("reviews_spotify.csv", 'r', encoding='iso-8859-1') as readfile:
    csvreader = csv.reader(readfile)
    with open('full_text.txt', 'w', encoding='iso-8859-1', newline='') as writefile:
        filewriter = csv.writer(writefile, delimiter=',')
        row_count = 0
        for row in csvreader:
            if row_count != 0:
                try:
                    filewriter.writerow([row[1]])
                except:
                    pass
            row_count += 1

        # result = ""
        # for line in writefile:
        #     if not line.isspace():
        #         result += line
    
        # writefile.seek(0)  
        # writefile.write(result)

