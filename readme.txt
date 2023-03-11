this project 


AFTHacketon folder:
    

NLTK folder:
    this module contains all the methods to extract the most important keywords out of a large .txt file
    keywords.py contains the modules to extract a large number of keywords while similarity_filter calls this method but only keeps the most relevant output
    stop_words are files necessary for the language model

    input files are: bad_rating.txt, bad_reviews_from_last_week.txt, full_text.txt, opinion_file.txt
    output files are: keywords_similarity.txt

simonR folder:
    the important file in this folder is key_words.py, the input for this file is the keywordlist in the main function. 
    this contains keywords collected form the language algorithm and looks for the highest rated reviews. 
    Then chatGPT make a summary of these reviews and based on the summary suggest solutions for the most prominent problems in the summary.





