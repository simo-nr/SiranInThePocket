import csv
import re
from datetime import date, datetime, timedelta

def remove_non_letters(s):
    return re.sub(r'[^a-zA-Z\s]+', '', s)

# this function returns the reviews in a certain range of data
def reviewsAfterDate(date):
    relevantReviews = []
    with open("reviews_spotify.csv", 'r', encoding="iso-8859-1") as readfile:
        csvreader = csv.reader(readfile)
        next(csvreader, None)  # skip the headers
        for review in csvreader:
            print(review[0])
            if str(review[0]) >= str(date):
                if int(review[2]) < 4:
                    relevantReviews.append(review)
            else:
                break
    return relevantReviews

current_date = datetime.fromisoformat('2022-07-09 15:00:00')
week_ago = current_date - timedelta(weeks=1)
list = reviewsAfterDate(week_ago)
print(len(list))

with open('./simonR/bad_reviews_from_last_week.txt', 'w', encoding='iso-8859-1', newline='') as writefile:
        filewriter = csv.writer(writefile, delimiter=',')
        for review in list:
            filewriter.writerow([review[1]])