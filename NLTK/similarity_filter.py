import BERTSimilarity.BERTSimilarity as bertsimilarity
b =bertsimilarity.BERTSimilarity()
import csv
from keywords import get_keywords

#keywords = get_keywords("bad_reviews_from_last_week.txt","e")
keywords = [('unamusing spotify listen podcasts', 0.759), ('spotify premium app terrible', 0.741), ('unusable songs play app', 0.7248), ('spotify update longer play', 0.7179), ('audio skipping songs adblocker', 0.714), ('spotify listen podcasts', 0.7138), ('fix spotify great app', 0.7135), ('skipping songs adblocker', 0.712), ('app spotify update longer', 0.7106), ('spotify app issue', 0.7053), ('frustrating spotify app', 0.7049), ('fix spotify podcasts getting', 0.7031), ('spotify podcasts getting', 0.7021), ('premium issue brought spotify', 0.7017), ('spotify premium app', 0.6993), ('skipping songs adblocker website', 0.6978), ('songs play app', 0.6962), ('songs annoying app', 0.6957), ('spotify app unusable', 0.6942), ('bad app resso spotify', 0.691), ('spotify bad afford premium', 0.6904), ('bad spotify mobile', 0.6897), ('app sucks spotify premium', 0.6896), ('playback fix spotify podcasts', 0.6894), ('spotify mobile horrible', 0.6874), ('spotify useless pay premium', 0.6873), ('app makes spotify hard', 0.6862), ('terrible app play song', 0.6842), ('listen songs app issues', 0.6821), ('app hate spotify', 0.6809), ('spotify useless songs', 0.6806), ('bad spotify mobile horrible', 0.6796), ('spotify app starts playing', 0.6785), ('song pathetic uninstalled app', 0.6774), ('spotify useless songs ads', 0.6773), ('love spotify app unusable', 0.6768), ('app spotify update', 0.6765), ('song playing app', 0.6762), ('songs app issues worse', 0.6756), ('spotify update longer', 0.6749), ('pay music skips want', 0.6732), ('songs annoying app horrendous', 0.6727), ('app hate spotify free', 0.6719), ('songs app issues', 0.6707), ('app won access music', 0.6694), ('playlist downloaded app crashing', 0.6658), ('terrible ui android spotify', 0.6628), ('app sucks spotify', 0.6621), ('off update spotify glitch', 0.6621), ('music streaming app ads', 0.6612), ('app stuck song play', 0.6602), ('constantly app music won', 0.6596), ('getting frustrating spotify', 0.6587), ('update spotify glitch', 0.6554), ('premium spotify simply terrible', 0.6512), ('app resso spotify', 0.6508), ('fine spotify nice app', 0.6501), ('podcasts ve downloaded offline', 0.6493), ('must add download music', 0.6485), ('app downloaded songs', 0.6476), ('free mode listen songs', 0.6473), ('songs bugs spotify', 0.6469), ('days getting frustrating spotify', 0.6468), ('playlist downloaded app', 0.6463), ('music option tha application', 0.6451), ('premium truly ridiculous spotify', 0.6439), ('ads spotify bad afford', 0.6418), ('hate app extra songs', 0.64), ('please spotify fix', 0.6392), ('need continue spotify premium', 0.6371), ('stopping playlist downloaded app', 0.6337), ('randomly stopping playlist downloaded', 0.6328), ('android play music list', 0.6284), ('app won download songs', 0.6273), ('songs deleted reinstalled app', 0.6249), ('playlist annoying please fix', 0.6234), ('song app open uninstalled', 0.6231), ('broken android play music', 0.6223), ('app resso spotify song', 0.6222), ('music app crashes attempt', 0.6129)]

# Create a list of only the strings from the list of tuples
string_list = [phrase[0] for phrase in keywords]
print(string_list)
Result = [[string_list[0]]]
string_list  = string_list[1:]
for keyword in string_list:
    index = 0
    found = False
    while index < len(Result)  and not found:
        synonym_list = Result[index]
        dist = b.calculate_distance(synonym_list[0], keyword)
        if dist > 0.87:
            Result[index].append(keyword)
            found = True
        index += 1
    if not found:
        Result.append([keyword])
    if len(Result) == 5:
        break

wbfile = open("keywords_similarity.txt","w")
writer = csv.writer(wbfile)
for synoniemenlijst in Result:
    to_write =  ""
    for keywords in synoniemenlijst:
        to_write = to_write + str(keywords.split(' '))
    writer.writerow([to_write])
    
wbfile.close()
print(Result)