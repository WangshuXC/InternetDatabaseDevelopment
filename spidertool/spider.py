import requests
import json
import re
import time
from bs4 import BeautifulSoup
import pymysql
import urllib.parse


def spider(url, movieList):
    response = requests.get(url)
    soup = BeautifulSoup(response.text, "html.parser")

    json1 = json.loads(soup.text)

    items = json1["list"]
    # movieList = []
    for item in items:
        item["all_title"] = re.sub(r"^\[[^][]*\]", "", item["all_title"])
        a = {
            "id": item["id"],
            "title": item["channel"],
            "content": item["all_title"],
            "updatetime": item["uploadtime"],
            "picurl": item["imglink"],
        }
        parsed_url = urllib.parse.urlparse(item["imglink"])
        path = parsed_url.path
        # 获取最后一个斜杠之前的子串
        last_slash = path.rfind("/") + 1
        # 获取最后一个斜杠之后的子串
        last_part = path[last_slash:]
        videoId = last_part.split("-")[0]

        url = "https://vdn.apps.cntv.cn/api/getHttpVideoInfo.do?pid=" + videoId
        response1 = requests.get(url)
        json2 = json.loads(response1.text)
        b = json2["video"]["chapters4"][0]["url"]
        a["videourl"] = b
        # 检查是否存在重复的 id
        if any(movie["id"] == a["id"] for movie in movieList):
            continue

        movieList.append(a)
    # print(movieList)


# 创建数据库连接
connection = pymysql.connect(
    host="localhost",
    user="root",
    password="root",
    db="internetdatabasedevelopment",
)

# 创建游标对象
cursor = connection.cursor()
movieList = []
# 发送 GET 请求，获取网页 HTML 内容
for page in range(1, 6):
    url = f"https://search.cctv.com/ifsearch.php?page={page}&qtext=%E6%A0%B8%E6%B1%A1%E6%9F%93&sort=relevance&pageSize=20&type=web&vtime=-1&datepid=1&channel=&pageflag=1&qtext_str=%E6%A0%B8%E6%B1%A1%E6%9F%93"
    print(page)
    spider(url, movieList)
    time.sleep(10)

for movie in movieList:
    query = f"INSERT INTO videos (VideoID, Title, Description, PictureURL, VideoURL, UploadDate) VALUES ('{movie['id']}', '{movie['title']}', '{movie['content']}', '{movie['picurl']}', '{movie['videourl']}','{movie['updatetime']}')"
    cursor.execute(query)
connection.commit()
connection.close()
