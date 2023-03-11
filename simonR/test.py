# import csv
# with open('test.csv', 'w') as file:
#     filewriter = csv.writer(file, delimiter=',')
#     filewriter.writerow(['Name', 'profession', 'test'])
# import string

# text = str(list(string.ascii_lowercase))

# import re

# def remove_non_letters(s):
#     return re.sub(r'[^a-zA-Z\s]+', '', s)

# print(remove_non_letters(text))

# relevantReviews = [None] * len("texkt")
# for element in relevantReviews:
#         element = []
# print(relevantReviews)

relevantReviews = [[None]] * len('qmldfjq')
for count, _ in enumerate(relevantReviews):
    relevantReviews[count] = []
print(relevantReviews)
relevantReviews[3].append(1)
print(relevantReviews)
