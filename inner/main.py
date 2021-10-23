# -*- coding: utf-8 -*-

#!pip install newspaper3k
#!pip install bs4
#!pip install readability
#!pip3 install readability-lxml
import sys
#import requests
#import nltk
#import re

# from newspaper import Article
# from bs4 import BeautifulSoup
# from readability import Document as Paper
# from requests.packages.urllib3.exceptions import InsecureRequestWarning
# #nltk.download('punkt')

if __name__ == "__main__":
    print(f"Arguments count: {len(sys.argv)} \n")
    for i, arg in enumerate(sys.argv):
        print(f"\nArgument {i:>6}: {arg}")
    print('keyphrases')
    url = "https://news.cancerresearchuk.org/2009/08/24/high-impact-science-finding-faults-in-braf/"
    keywords = ['treatment', 'drugs']
    print('keyphrases')

    #keyphrases = parse_link(url, keywords)
    




# def get_article(url):
#   article = Article(url)
#   article.download()
#   article.parse()

#   return article

# def get_keywords(article):
#   article.nlp()

#   return article.keywords

# def get_sentences(article):
#   text = article.text
#   sentences = text.split(".")
#   sentences = text.split("\n")

#   return sentences 

# def get_keyphrases(sentences, search_keywords):
#   keyphrases = list()
#   for sentence in sentences:
#     if (any(map(lambda word: word in sentence, search_keywords))):
#       keyphrases.append(sentence)
  
#   return keyphrases

# def parse_link(url, keywords):
#   article = get_article(url)
#   keyphrases = get_keyphrases(get_sentences(article), keywords)

#   return keyphrases



    