import BERTSimilarity.BERTSimilarity as bertsimilarity
b =bertsimilarity.BERTSimilarity()

# Define a list of tuples
keywords = [('premium music app good', 0.7562), (' app music', 0.6412), ('premium truly ridiculous ', 0.6623), ('skip music', 0.6105), ('fake bot playlists ', 0.7034), (' plays random', 0.701), ('playlist spotify wants', 0.6797), ('spotify problems podcasts randomly', 0.6998), ('song premium user spotify', 0.679), ('spotify company app crashes', 0.6912), ('spotify music app', 0.7005), ('adsthis music player', 0.6918), ('streaming music podcast app', 0.6695), ('app premium great music', 0.62), ('enjoy spotify premium', 0.6725), ('spotify fix broken app', 0.6984), ('spotify great app trouble', 0.7584), ('ads beautiful journey spotifypositive', 0.7025), ('music streaming app thereit', 0.6558),]# ('spotify app breaks', 0.6076), ('spotify premium pretty annoying', 0.7005), ('ads great songs app', 0.6325), ('spotify good worst skip', 0.5902), ('listen playlist spotify wants', 0.6812), ('problem spotify', 0.6966), ('phone broken paying spotify', 0.6524), ('faults spotify fix thanksit', 0.6523), ('spotify buggy', 0.7081), ('easy app enjoyrecently spotify', 0.6904), ('music app great', 0.6133), ('spotify premium podcasts working', 0.6943), ('free spotify made premium', 0.6609), ('listen music cheap app', 0.5841), ('spotify problems podcasts', 0.6898), ('pandora make playlist', 0.6247), ('spotify hard well android', 0.6666), ('looking music streaming aap', 0.6468), ('app rely spotify listening', 0.6675), ('spotify app constantly', 0.6709), ('podcasts advert play controls', 0.6404), ('spotify music app suggest', 0.6871), ('fixsometimes spotify plays random', 0.671), ('application spotify premium', 0.722), ('app unreliable podcasts', 0.6923), ('listen songs appthese issues', 0.6281), ('problem want spotify', 0.7061), ('spotify fix thanksit', 0.6443), ('spotify app', 0.6992), ('spotify premium reccomendgives ads', 0.6766), ('bot playlists spotify', 0.6698), ('app skips songs', 0.6511), ('great music app premium', 0.6152), ('app sucks spotify premium', 0.6841), ('paid premium music app', 0.688), ('easy spotify premium', 0.7107)]
# Create a list of only the strings from the list of tuples
string_list = [phrase[0] for phrase in keywords]
print(string_list)

Big_list = [[string_list[0]]]
string_list  = string_list[1:]

for keyword in string_list:
    index = 0
    found = False
    while index < len(Big_list)  and not found:
        synonym_list = Big_list[index]
        dist = b.calculate_distance(synonym_list[0], keyword)
        if dist > 0.8:
            Big_list[index].append(keyword)
            found = True
            print(".",end="")    
        index += 1
    if not found:
        Big_list.append([keyword])
    
    if len(Big_list) == 5:
        break

print(Big_list)





