# -*- coding: utf-8 -*-

import sys
import subprocess
import requests
import nltk
import re
from bs4 import BeautifulSoup
import readability
import requests
nltk.download('punkt')
from newspaper import Article


def install(package):
    subprocess.check_call([sys.executable, "-m", "pip", "install", package])


sys.path.append('C:/Users/alexa/AppData/Local/Programs/Python/Python310/Lib/site-packages')
def import_file(full_path_to_module):
    try:
        import os
        module_dir, module_file = os.path.split(full_path_to_module)
        module_name, module_ext = os.path.splitext(module_file)
        save_cwd = os.getcwd()
        os.chdir(module_dir)
        module_obj = __import__(module_name)
        module_obj.__file__ = full_path_to_module
        globals()[module_name] = module_obj
        os.chdir(save_cwd)
    except Exception as e:
        raise ImportError(e)
    return module_obj


#import_file('C:/Users/alexa/AppData/Local/Programs/Python/Python310/Lib/site-packages/newspaper/article.py')

# load_source('article.py', 'C:/Users/alexa/AppData/Local/Programs/Python/Python310/Lib/site-packages/')

# #from newspaper import Article
# print("here")
# 
# print("here")
# import newspaper
# print("here")
# from newspaper import Article
# print("here")


def get_article(url):
  article = Article(url)
  article.download()
  article.parse()
  return article

def get_keywords(article):
  article.nlp()

  return article.keywords

def get_sentences(article):
  text = article.text
  sentences = text.split(".")
  sentences = text.split("\n")
  
  return sentences 

def get_keyphrases(sentences, search_keywords):
  keyphrases = list()
  for sentence in sentences:
    if (any(map(lambda word: word in sentence, search_keywords))):
      keyphrases.append(sentence)
  
  return keyphrases

def parse_link(url, keywords):
  #print(type(keywords))
  article = get_article(url)
  keyphrases = get_keyphrases(get_sentences(article), keywords)

  return keyphrases


if __name__ == "__main__":
    print(sys.argv[1])
    print(sys.argv[2])
    keyphrases = parse_link(sys.argv[1], sys.argv[2])
    print(keyphrases)