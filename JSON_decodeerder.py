import json
from datetime import datetime
from datetime import datetime
from dateutil.relativedelta import relativedelta
import re

lijst = [['eerlijk bezorgde pakket', 'pakket uitstekend altijd', 'pakketten altijd snel', 'pakket altijd snel'], ['bestelling beschadigd pakket']]

with open(r'C:/Users/simon/OneDrive/Documenten/back_end_development/SiranInThePocket/holyhack_userreviews/reviews_pakket.json', encoding='iso-8859-1') as file_object:
    json_data = file_object.read()    
    data = json.loads(json_data)

def date_convertor(date):
    start_date = date.replace("Z",'')
    start_date = start_date.replace("\"",'')
    return start_date

def filter_per_week(aantal_weken, start_date):
    date_str = start_date
    date_obj = datetime.fromisoformat(date_str)
    new_date_obj = date_obj + relativedelta(weeks=-aantal_weken)
    new_date_str = new_date_obj.isoformat()
    return(new_date_str)

def filter_per_dag(aantal_dagen, start_date):
    date_str = start_date
    date_obj = datetime.fromisoformat(date_str)
    new_date_obj = date_obj + relativedelta(days=-aantal_dagen)
    new_date_str = new_date_obj.isoformat()
    return(new_date_str)

def timeweek(counter, aantal_weken):
    start_date = date_convertor(data[counter]["date"])
    print(datetime.fromisoformat(start_date))
    dateTimeMinusWeeks = filter_per_week(aantal_weken, start_date )
    print(dateTimeMinusWeeks)
    return dateTimeMinusWeeks

def timeday(counter, aantal_dagen):
    start_date = date_convertor(data[counter]["date"])
    dateTimeMinusWeeks = filter_per_dag(aantal_dagen, start_date )
    print(dateTimeMinusWeeks)
    return dateTimeMinusWeeks


def filter_filter_lijst(lijst):
    for element in lijst:
        for item in element:
            words = item.split()
            pattern_string = "^" + "(?=.*" + ")(?=.*".join(words) + ").*"
            pattern = re.compile(pattern_string)

            with open("opinion_file.txt", "r", encoding="iso-8859-1") as file:
                for line in file:
                    match = pattern.search(line)
                    if match:
                        print(line.strip())

def files():
    f1=open('bad_rating.txt', 'w+', encoding="iso-8859-1")
    f2=open('good_rating.txt', 'w+', encoding="iso-8859-1")
    counter = 0
    print(data[counter]["date"])
    while date_convertor(data[counter]["date"]) > date_convertor(timeweek(0,1)):
        counter += 1
    for x in range(counter):
        if int(data[x]["score"]) < 7:
            echt = data[x]["opinion"].replace("\n", ' ')
            f1.write(echt+"\n")
        else:
            echt = data[x]["opinion"].replace("\n",' ')
            f2.write(echt+"\n")

    f1.close()
    f2.close()

def aantal_reviews_laatste_2_weken():
    x=0
    while x < 14:
        f=open('amountOfReview.txt', 'w+', encoding="iso-8859-1")
        counter = 0
        print(data[counter]["date"])
        print(date_convertor(timeday(0,1)))
        while date_convertor(data[counter]["date"]) > date_convertor(timeday(counter,1)):
            counter += 1 
        f.write(str(counter))
        print(counter)
        f.close()
        x+=1