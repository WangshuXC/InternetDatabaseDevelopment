import requests
import json
import re
from bs4 import BeautifulSoup

# 发送 GET 请求，获取网页 HTML 内容
url = "https://search.cctv.com/ifsearch.php?page=1&qtext=%E6%A0%B8%E6%B1%A1%E6%9F%93&sort=relevance&pageSize=20&type=web&vtime=-1&datepid=1&channel=&pageflag=1&qtext_str=%E6%A0%B8%E6%B1%A1%E6%9F%93"
response = requests.get(url)

soup = BeautifulSoup(response.text, "html.parser")
# print(soup)

json = json.loads(soup.text)

items = json["list"]
movieList = []
for item in items:
    item["all_title"] = re.sub(r"^\[[^][]*\]", "", item["all_title"])
    a = {
        "id": item["id"],
        "title": item["channel"],
        "content": item["all_title"],
        "picurl": item["imglink"],
    }
    movieList.append(a)
print(movieList)
