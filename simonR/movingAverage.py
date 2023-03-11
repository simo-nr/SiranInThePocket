import csv
from operator import itemgetter


def movingAverage():
    # give list of average rating per week
    # average rating out between 3 days
    
    
    with open("reviews_spotify.csv", 'r', encoding="iso-8859-1") as readfile:
        csvreader = csv.reader(readfile)
        # all_reviews = []
        # for review in csvreader:
        #     all_reviews.append(review)
        # # sort csv by date
        # get_n = itemgetter(0)
        # all_reviews.sort(key=get_n, reverse=True)
        # print(all_reviews)

        # start at first date, end at last date
        next(csvreader)
        firstLine = next(csvreader)
        print(csvreader[1])

movingAverage()
