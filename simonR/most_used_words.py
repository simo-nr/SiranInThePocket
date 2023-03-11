import csv
from operator import itemgetter

all_words = []
word_list_list = []

with open("full_text.csv", 'r', encoding='iso-8859-1') as readfile:
    csvreader = csv.reader(readfile)
    
    counter = 0
    for row in csvreader:
        if True:
            if row != []:
                word_list = row[0].split()
                for word in word_list:
                    counter += 1
                    # print(word)
                    if word not in all_words: # add new word
                        print(f"new word {counter}")
                        list = [word, 1]
                        all_words.append(word)
                        word_list_list.append(list)
                    else:
                        # increase count for already existing word
                        i = 0
                        while word != word_list_list[i][0]:
                            i += 1
                        word_list_list[i][1] += 1
                        print(word_list_list[i])

get_n = itemgetter(1)
word_list_list.sort(key=get_n, reverse=True)
print(word_list_list)

with open("most_used_words.txt", 'w', encoding='iso-8859-1', newline='') as file:
    csvwriter = csv.writer(file)
    for element in word_list_list:
        # print(f"element {element}")
        csvwriter.writerow(element)
# print(word_list_list)
