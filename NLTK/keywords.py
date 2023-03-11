# script.py
from keybert import KeyBERT
kw_model = KeyBERT()
import csv

#language = input("language e/n")
language = "e"

if language == 'e':
    print("engels")
    f1 = open("stop_words_engels.txt",'r')
elif language == 'n':
    print("nederlands")
    f1 = open("stop_words_nederlands.txt",'r')

#stopwoordenfile
stringSwords = f1.read()
stringSwords = stringSwords.replace("\n"," ")
swords = stringSwords.split(" ")
f1.close()


comments = "full_text.txt"
#comments = input("type filename")


with open(comments,'r',encoding='iso-8859-1') as fd:
    csvreader = csv.reader(fd)

    currentbufferstring = ""
    keywords = []

    for row in csvreader:
        try:
            currentbufferstring = currentbufferstring + row[0]
        except:
            test = kw_model.extract_keywords(currentbufferstring)
            print(kw_model.extract_keywords(currentbufferstring, keyphrase_ngram_range=(2, 4), stop_words=swords))
            currentbufferstring = ""

    print(keywords)

