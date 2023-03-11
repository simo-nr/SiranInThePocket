# script.py
from keybert import KeyBERT
kw_model = KeyBERT()
#language = input("language e/n")
language = "n"

if language == 'e':
    print("engels")
    f1 = open("stop_words_engels.txt",'r')
elif language == 'n':
    print("nederlands")
    f1 = open("stop_words_nederlands.txt",'r')

#stopwoordenfile
stringSwords = f2.read()
stringSwords = stringSwords.replace("\n"," ")
swords = stringSwords.split(" ")
f2.close()


comments = "full_text.txt"
#comments = input("type filename")

def my_read(file, size=2048):
    while 1:
        data = file.read(size)
        if not data:
            break
        yield data


with open(comments) as f:
    for piece in my_read(f):
        keywords = kw_model.extract_keywords(piece)

print(kw_model.extract_keywords(doc, keyphrase_ngram_range=(2, 4), stop_words=swords))
