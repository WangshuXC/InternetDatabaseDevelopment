import requests
import json
import re
import time
from bs4 import BeautifulSoup
import pymysql
import urllib.parse

url = "https://www.chinanews.com.cn/sh/2023/12-20/10131942.shtml"

response = requests.get(url)
response.encoding = "utf-8"
soup = BeautifulSoup(response.text, "html.parser")

elements = soup.find(class_="left_zw")


print(elements.text)
