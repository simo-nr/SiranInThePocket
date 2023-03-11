# script.py
from keybert import KeyBERT
kw_model = KeyBERT()
import csv

def get_keywords(tekst_name,language="e"):
    #language = "e/n")
    
    if language == 'e':
        print("engels")
        f1 = open("stop_words_engels.txt",'r')
    elif language == 'n':
        print("nederlands")
        f1 = open("stop_words_nederlands.txt",'r')

    stringSwords = f1.read()
    stringSwords = stringSwords.replace("\n"," ")
    swords = stringSwords.split(" ")
    f1.close()
    
    with open(tekst_name,'r',encoding='iso-8859-1') as fd:
        csvreader = csv.reader(fd)
        #print("file geopend")
        currentbufferstring = ""
        min,max = 3,4
        keywords = []
        lines = 0
        

        #uses Bert to find keywords in the comments
        for row in csvreader:
            try:
                currentbufferstring = currentbufferstring + " " + row[0]
                lines += 1
                if lines > 100:
                    lines = 0
                    addkeywords(keywords,currentbufferstring,min,max,swords)
                    currentbufferstring = ""

            except:
                addkeywords(keywords,currentbufferstring,min,max,swords)
                currentbufferstring = ""
        
        
        addkeywords(keywords,currentbufferstring,min,max,swords)                
        keywords.sort(key = lambda x: x[1],reverse=True)
        return keywords
        

def addkeywords(keywords,string,min,max,stopwords):
    for element in (kw_model.extract_keywords(string, keyphrase_ngram_range=(min,max), stop_words=stopwords)):
        keywords.append(element)

print(get_keywords("bad_reviews_from_last_week.txt","e"))

