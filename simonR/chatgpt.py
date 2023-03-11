import openai

import os
# os.system("pip install openai")
print('hello world')

with open("./simonR/chatGPTkey.txt") as f:
    openai.api_key = f.readline()



respons = openai.ChatCompletion.create(
    model="gpt-3.5-turbo",
    messages = [
        {'role': 'system', 'content': "you are a user researcher"},
        {'role': 'user', 'content': "hello there"}
    ],
    max_tokens = 256
)

print(respons)