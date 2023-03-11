from time import time
start = time()
import BERTSimilarity.BERTSimilarity as bertsimilarity
t = time()
print("imported", t-start)
b =bertsimilarity.BERTSimilarity()
t = time()
print("module made", t-start)

str1 = "simon says he is good at programming"
str2 = "simon says he likes programming"
str3 = "programming is what simon likes"

start = time()
dist = b.calculate_distance(str1,str2)
t = time()
print("distance1 calculated", t-start)
print(dist)

start = time()
dist2 = b.calculate_distance(str2,str3)
t = time()
print("distance2 calculated", t-start)
print(dist)