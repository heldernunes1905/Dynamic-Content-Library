import mechanicalsoup
from bs4 import BeautifulSoup


browser = mechanicalsoup.StatefulBrowser()
browser.open("https://en.wikipedia.org/wiki/Lists_of_films")

movie_list_url = []
movie_url = []
movie_title = []
movie_desc = []
movie_img = []
movie_date = []
movie_runtime = []

div = browser.page.find("table", attrs={"class" : "wikitable"}).find_all("tr")

for i in div:
    a = i.find_all("a",href=True)
    for j in a:
        movie_list_url.append("https://en.wikipedia.org" + j["href"])
        
movie_list_url = movie_list_url[:1]

     
for o in movie_list_url:
    response = browser.open(o)
    div = browser.page.find("div", attrs={"class" : "mw-parser-output"})

    for p in div.find_all("div", attrs={"class" : "div-col"}):
        li = p.find_all("li")
        for j in li:
            a = j.find_all("a",href=True)
            for i in a:
                movie_url.append('https://en.wikipedia.org' + i["href"])
                movie_title.append(i["href"].replace("/wiki/","").replace("_"," "))

movie_url = movie_url[:5]
movie_title = movie_title[:5]




for k in movie_url:
    browser.open(k)
    div_desc = browser.page.find("div", attrs={"id" : "mw-content-text"}).find_all("p")
    div_img = browser.page.find("img", attrs={"class" : "thumbborder"})
    
    
    response = browser.open(k)
    html_content = response.text
    
    # parse the HTML content using BeautifulSoup
    soup = BeautifulSoup(html_content, 'html.parser')

    # find the first `p` element on the page
    p_element = soup.find('img', {'class': 'thumbborder'})
    table_element = soup.find("table", attrs={"class" : "infobox vevent"})
    
    if p_element:
       movie_img.append(div_img["src"])
    else:
        movie_img.append("NO IMG AVAILABLE")
    
    if table_element:
        temp_div = browser.page.find("table", attrs={"class" : "infobox vevent"}).find_all("tr")
        for m in temp_div:
            th_get = m.find_all("th")
            for b in th_get:
                m_text = b.text
                if m_text == "Release date":
                    movie_date.append(m.text.replace("Release date","").replace("\n","").replace("\xa0"," "))
               
                if m_text == "Running time":
                    movie_runtime.append(m.text.replace("Running time",""))
                
    else:
        movie_date.append("00-00-0000")
        movie_runtime.append("0")
        
        
