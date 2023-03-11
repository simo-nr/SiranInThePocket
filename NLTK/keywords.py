# script.py
from keybert import KeyBERT

f2 = open("stop_words_nederlands.txt",'r')
stringSwords = f2.read()
print(stringSwords)
stringSwords = stringSwords.replace("\n"," ")
swords = stringSwords.split(" ")
print(swords)
f2.close()
input()


file = open("opinion_file.txt",'r',encoding= 'iso-8859-1')
doc = file.read()



kw_model = KeyBERT()
keywords = kw_model.extract_keywords(doc)

print(kw_model.extract_keywords(doc, keyphrase_ngram_range=(2, 3), stop_words=swords))
