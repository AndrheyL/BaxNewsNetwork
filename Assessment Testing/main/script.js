//Api Key from Students is here
const apiKey = '38a32484c7ec41438ce8113603daefc1'

//Variable created to get data from main.php
const containerNews = document.getElementById("newsContainer");
const searching = document.getElementById('searchInput');
const ButtonSearch = document.getElementById('searchButton');

//Function is used for getting news from recent time
async function fetchRandomNews(){
    try{
        //Since there is alot of data presented for the news, we use the await command to slow down the processes
        const apiUrl = `https://newsapi.org/v2/top-headlines?country=us&pageSize=12&apiKey=38a32484c7ec41438ce8113603daefc1`;
        const response = await fetch(apiUrl);
        const data = await response.json();
        return data.articles;
    } catch(error){
        console.error("Error Getting News", error);
        return[];
    }
}

//Button that searches whatever the user inputted in the search bar
ButtonSearch.addEventListener("click",async ()=>{
    const query = searching.value.trim()
    if(query !== ""){
        try{
            const articles = await fetchNewsQuery(query);
            displayNews(articles)
        } catch(error){
            console.log("Error Displaying News", error);
        }
    }
})

//Fetches a query for the Javascript to load
async function fetchNewsQuery(query){
    try{
        const apiUrl = `https://newsapi.org/v2/everything?q=${query}&pageSize=12&apiKey=38a32484c7ec41438ce8113603daefc1`;
        const response = await fetch(apiUrl);
        const data = await response.json();
        return data.articles;
    } catch(error){
        console.error("Error Getting News", error);
        return[];
    }
}

//Function that directs images, texts, and headlines to the main.php section
function displayNews(articles){
    containerNews.innerHTML = "";
    articles.forEach((article) =>{
        //Create variables for to create an element
        const CardNews = document.createElement("div");
        CardNews.classList.add("newsCard");
        const img = document.createElement("img");
        img.src = article.urlToImage;
        img.alt = article.title;
        const title = document.createElement("h2");

        //Limits the amount of characters allowed in the article
        const truncatedTitle = article.title.length > 30? article.title.slice(0,30) + "..." : article.title;
        title.textContent = truncatedTitle;
        
        const description = document.createElement("p");
        description.textContent = article.description;

        //Transfers the existed data from other sources to main.php
        CardNews.appendChild(img);
        CardNews.appendChild(title);
        CardNews.appendChild(description);
        CardNews.addEventListener('click',()=>{
            window.open(article.url, "_blank");
        })
        containerNews.appendChild(CardNews);
    })
}

//Function the displays of the articles
(async()=>{
    try{
        const articles = await fetchRandomNews();
        displayNews(articles);
    } catch(error) {
        console.error("Error Getting News", error);
    }
})();