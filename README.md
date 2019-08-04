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
[To do]

## Front-end
### Admin: Indexing Launcher 
- The Admin screen in which the user can type/paste a URL to be indexed, passing it to the Indexing Engine mentioned above. Alternatively, one can add an option to the previously created screens that for any search result in Phases 1, one clicks a button to index selected items

### Admin: Search History and Stats
- Present a list of all user searches, the terms, number of search results, and how long they took. 

### Search Entry
- This is the screen in which a user types a search term(s) and clicks Search, then waits for results. Since there is ambiguity as how a user intends to search, ideally these should be handled by explicit options on the screen (using radio buttons or checkboxes), such as 
• case-insensitive 
• allow partial match 

This fundamental query will drive the search: 

SELECT * 
FROM page, word, page_word 
WHERE page.pageId = page_word.pageId 
AND word.wordId = page_word.wordId 
AND word.wordName = ‘wordEntered ‘
ORDER BY freq desc

where wordEntered is the search word entered in the search box. 

### Search Results and Download
- The query in the previous section should be sent to the database. One iterates through the database results (in a way similar to how one iterated through the contents of the JSON, CSV, and XML files or the Google search) and build and display a set of results. 

The same download feature available in Phase 1 should also be available in Phase 2 (checkboxes, Select/Deselect All, Save As JSON/XML/CSV). 


## Hosting
[To do]
