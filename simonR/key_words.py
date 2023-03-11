import csv
import string
import re
from operator import itemgetter
from datetime import date, datetime, timedelta


def remove_non_letters(s):
    return re.sub(r'[^a-zA-Z\s]+', '', s)

def getReviewsWithKeyWords(setsKeyWords, date):
    # initial list containing empty lists
    relevantReviews = [[None]] * len(setsKeyWords)
    for count, _ in enumerate(relevantReviews):
        relevantReviews[count] = []
    
    with open("reviews_spotify.csv", 'r', encoding="iso-8859-1") as readfile:
        csvreader = csv.reader(readfile)
        next(csvreader, None)  # skip the headers
        for review in csvreader:
            print(review[0])
            if str(review[0]) >= str(date):
                if int(review[2]) < 4:
                    text = remove_non_letters(review[1])
                    wordsInReview = text.lower().split() # list with the words in a review
                    for count, keyWords in enumerate(setsKeyWords): # select the set of keywords
                        keyWordsList = keyWords.split()
                        if all(keys in wordsInReview for keys in keyWordsList): # check if review contains keywords
                            # select review
                            # add review to list (by timestamp)
                            relevantReviews[count].append(review)
            else:
                break
    
    # print(relevantReviews)
    # sort reviews by date
    # get_n = itemgetter(0)
    # relevantReviews.sort(key=get_n, reverse=True)
    print(relevantReviews)
    return relevantReviews
    
            
current_date = datetime.fromisoformat('2022-07-09 15:00:00')
week_from_now = current_date - timedelta(weeks=1)
print(week_from_now)
list = getReviewsWithKeyWords(['music'], week_from_now)
print(len(list[0]))

with open('./simonR/bad_reviews_from_last_week.txt', 'w', encoding='iso-8859-1', newline='') as writefile:
        filewriter = csv.writer(writefile, delimiter=',')
        for review in list[0]:
            filewriter.writerow(review)