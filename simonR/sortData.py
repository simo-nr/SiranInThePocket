import csv

with open("reviews_spotify.csv", 'r', encoding='iso-8859-1') as file:
    csvreader = csv.reader(file)
    with open('full_text.csv', 'w', encoding='iso-8859-1') as file:
        filewriter = csv.writer(file, delimiter=',')
        # sort on rating
        # sort by subject
        # totalAverage = 0
        row_count = 0
        # max_rating = 0

        # low_reviews = []
        # high_reviews = []
        # average_reviews = []
        # highly_rated_reviews = []
        # used_words = []

        for row in csvreader:
            if row_count != 0:
                # totalAverage += int(row[2])
                # if int(row[2]) > max_rating:
                #     max_rating = int(row[2])
                # if row[0] == '2022-01-01 03:49:27':
                #     print(row)
                #     print(row[1])
                try:
                    print(row[1])
                except:
                    pass

                # filewriter.writerow(row[1])
            row_count += 1
        # row_count -= 1
        # totalAverage = totalAverage / row_count
        # print(f"max rating {max_rating}")
        # print(totalAverage)