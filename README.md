# Sachi search-engine

A search engine made from scratch, that allows users to select sites they want to search and download selected search results as a CSV, XML, or JSON file.

## Project Components
1. [Back-end developmet](#Back-end) 
2. [Database administration and optimization](#Database)
3. [Front-end development](#Front-end)
4. [Hosting and deployment](#Hosting)

## Wireframes
### Sachi Homepage
<img src="https://github.com/JazmynFuller/search-engine/blob/master/wireframes/cs355pages-02.png?raw=true" width=600>
### Sachi Results
<img src="https://github.com/JazmynFuller/search-engine/blob/master/wireframes/cs355pages-03.png?raw=true" width=600>
### Sachi Admin Home
<img src="https://github.com/JazmynFuller/search-engine/blob/master/wireframes/cs355pages-01.png?raw=true" width=600>
### Sachi Admin Search History
<img src="https://github.com/JazmynFuller/search-engine/blob/master/wireframes/cs355pages-04.png?raw=true" width=600>

## Back-end
### Crawler/Indexing Engine 
- The back-end module which takes a page next in line to be indexed, reads the content of the page, parses it into words, and updates the database as specified in the previous section. (Note that it will need to update tables page, word, and page_word, but not search.) For each page slated to be indexed, one also collect additional URLs to be indexed (by looking through it for “href” attributes). This somewhat akin to a “breadth first search”. 

## Database

## Front-end

## Hosting
