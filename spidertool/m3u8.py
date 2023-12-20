import requests
from bs4 import BeautifulSoup
import re

url = "https://tv.cctv.com//2023//07//06//VIDEW2vKMSKn8kZf0yO0b2Yf230706.shtml"

# 发送请求获取页面内容
response = requests.get(url)
if response.status_code == 200:
    html_content = response.text

    # 使用 BeautifulSoup 解析 HTML 内容
    soup = BeautifulSoup(html_content, "html.parser")

    # 查找所有的 script 标签
    script_tags = soup.find_all("script")

    # 在 script 标签中查找包含 getHttpVideoInfo.do 的内容
    for script_tag in script_tags:
        script_text = script_tag.get_text()
        # 使用正则表达式匹配 getHttpVideoInfo.do 开头的内容
        match = re.search(r'getHttpVideoInfo\.do.*?(?=")', script_text)
        if match:
            video_info_url = match.group(0)
            print(f"Found URL: {video_info_url}")
            break
    else:
        print("No matching URL found.")
else:
    print("Failed to fetch the webpage.")
