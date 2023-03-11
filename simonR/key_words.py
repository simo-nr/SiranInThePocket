import csv
import string
import re
from operator import itemgetter
from datetime import date, datetime, timedelta
import openai

with open("./simonR/chatGPTkey.txt") as f:
    openai.api_key = f.readline()


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
            # print(review)
            if str(review[0]) >= str(date):
                if int(review[2]) < 4:
                    text = remove_non_letters(review[1])
                    wordsInReview = text.lower().split() # list with the words in a review
                    for count, keyWords in enumerate(setsKeyWords): # select the set of keywords
                        keyWordsList = keyWords #.split()
                        if all(keys in wordsInReview for keys in keyWordsList): # check if review contains keywords
                            # select review
                            # add review to list (by timestamp)
                            relevantReviews[count].append(review)
            else:
                break
    return relevantReviews

def getChatGPTreview(reviews):
    nl = '\n'
    prompt1 = f"Give key insights about these reviews that talk about a music streaming app: {nl}"
    for review in reviews:
        prompt1 += str(review) + '\n'
    summary_json = openai.ChatCompletion.create(
            model="gpt-3.5-turbo",
            messages = [
                {'role': 'system', 'content': "you are a user researcher"},
                {'role': 'user', 'content': prompt1}
            ],
            max_tokens = 256
        )
    summary = summary_json['choices'][0]['message']['content']
    # print(prompt1)
    # print(f"summary:{summary}")

    prompt2 = f"Gives some possible solutions that the  company can implement based on the problems in the following summary: {nl}{summary}"
    possible_solutions_json = openai.ChatCompletion.create(
            model="gpt-3.5-turbo",
            messages = [
                {'role': 'system', 'content': "you are a user researcher"},
                {'role': 'user', 'content': prompt1},
                {'role': 'assistant', 'content': summary},
                {'role': 'user', 'content': prompt2}
            ],
            max_tokens = 256
        )

    possible_solutions = possible_solutions_json['choices'][0]['message']['content']
    # print(prompt2)
    # print(f"poss sol:{possible_solutions}")
    return summary, possible_solutions
    
def main():
    # give input
    # keywordlist = ['skipping', 'songs', 'adblocker']
    # print("Please enter one or more keywords to search for.")
    # keyword = input("enter keyword: ")
    # while keyword != "":
    #     keywordlist.append(keyword)
    #     keyword = input("enter keyword: ")
    # keywordlist = [keywordlist]

    current_date = datetime.fromisoformat('2022-07-09 15:00:00')
    week_from_now = current_date - timedelta(weeks=1)

    # playlist annoying please fix
    # skipping songs adblocker website
    # [['playlist', 'annoying', 'please', 'fix']]
    # keywordlist = ['unamusing', 'spotify', 'listen', 'podcasts']
    keywordlist = ['spotify', 'premium', 'app', 'terrible']
    # keywordlist = ['unusable', 'songs', 'play', 'app']
    #  keywordlist = ['spotify', 'update', 'longer', 'play']
    # keywordlist = ['audio', 'skipping', 'songs', 'adblocker']
    list = getReviewsWithKeyWords([keywordlist], week_from_now)
    # print(list)
    if len(list) > 2:
        get_n = itemgetter(3)
        list.sort(key=get_n, reverse=True)

    # filter only high rated reviews
    highest_rated_reviews = []
    for count, review in enumerate(list[0]):
        if count <= 2:
            highest_rated_reviews.append(review[1])

    # print(highest_rated_reviews)

    # for element in highest_rated_reviews:
    #     print(element)

    summary, solutions = getChatGPTreview(highest_rated_reviews)
    print('summary:')
    print(summary)
    print('\n')
    print('solutions:')
    print(solutions)


if __name__ == '__main__':
    main()