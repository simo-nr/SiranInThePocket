import csv
import string
import re

def remove_non_letters(s):
    return re.sub(r'[^a-zA-Z\s]+', '', s)

def getReviewsWithKeyWords(setsKeyWords, date):
    # initial list containing empty lists
    relevantReviews = [[None]] * len(setsKeyWords)
    for count, _ in enumerate(relevantReviews):
        relevantReviews[count] = []
    
    with open("reviews_spotify.csv", 'r', encoding="iso-8859-1") as readfile:
        csvreader = csv.reader(readfile)
        for review in csvreader:
            text = remove_non_letters(review[1])
            wordsInReview = text.lower().split() # list with the words in a review
            for count, keyWords in enumerate(setsKeyWords): # select the set of keywords
                keyWordsList = keyWords.split()
                if all(keys in wordsInReview for keys in keyWordsList): # check if review contains keywords
                    # select review
                    # add review to list (by timestamp)
                    relevantReviews[count].append(review)
    
    # sort reviews by date
    
            

getReviewsWithKeyWords(['niks'], 5)