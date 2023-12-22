import requests
import json
import re
import time
from bs4 import BeautifulSoup
import pymysql
import urllib.parse

with open("url.json", "r") as f:
    data = json.load(f)

urls = data
articleList = []

for i, url in enumerate(urls):
    response = requests.get(url)
    response.encoding = "utf-8"
    soup = BeautifulSoup(response.text, "html.parser")
    elements = soup.find(class_="content_maincontent_more")
    title = elements.find(class_="content_left_title").text
    print(title)
    time = re.sub(
        r"\s+|来源：", "", elements.find(class_="content_left_time").contents[0].strip()
    )
    time = re.sub(r"年|月", "-", time)
    time = re.sub(r"日", " ", time)
    time = re.sub(r"[^0-9\s:-]", "", time)
    time = time.strip()
    print(time)
    content = elements.find(class_="left_zw")
    pictext_tags = content.find_all(class_="pictext")
    for tag in pictext_tags:
        tag.decompose()

    # 查找class为adInContent的标签并删除
    ad_tags = content.find_all(class_="adInContent")
    for tag in ad_tags:
        tag.decompose()

    content = re.sub(
        r"<!--(.*?)-->",
        "",
        re.sub("</?a[^>]*>", "", str(content)),
    )
    content = re.sub(r'<div id="function_code_page"></div>', "", content)
    print(content)

    a = {
        "id": i + 200,
        "title": title,
        "content": content,
        "updatetime": time,
    }

    articleList.append(a)

# 创建数据库连接
connection = pymysql.connect(
    host="localhost",
    user="root",
    password="root",
    db="internetdatabasedevelopment",
)

# 创建游标对象
cursor = connection.cursor()

for article in articleList:
    query = "INSERT INTO articles (ArticleID, Title, Content, PublicationDate) VALUES (%s, %s, %s, %s)"
    values = (
        article["id"],
        article["title"],
        article["content"],
        article["updatetime"],
    )
    cursor.execute(query, values)


connection.commit()
connection.close()
