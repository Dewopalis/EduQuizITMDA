
const category = Array.from(document.getElementsByClassName("btn"));
const allCats = document.getElementById('categoriesList');
const difficulties = document.getElementById('difficulty');

localStorage.clear(); 

    
//adding onclick events for all buttons dynamically
category.forEach((cat => {
    cat.addEventListener('click', (e) => {
        console.log(e.target);
        allCats.classList.add('hidden');
        difficulties.style.left = "8rem";
        difficulties.classList.remove("hidden");
        
//storing the dataset value for chosen category to localstorage
        if(cat.getAttribute("data-cat")!=null){
           localStorage.setItem("cat", cat.getAttribute("data-cat"));
        }
//storing the dataset value for chosen difficulty to localstorage
        if(cat.getAttribute("data-difficulty") != null){
        localStorage.setItem("difficulty", cat.getAttribute("data-difficulty"));
        buildString();
        }
    });

    
}));



function buildString(){
//gets the selected category and difficulty from localstorage
    const selectedCategory= localStorage.getItem("cat");
    console.log(selectedCategory);
    let selectedDifficulty = localStorage.getItem("difficulty");
    console.log(selectedDifficulty);
 
 //builds the url for the API with these values   
    let url = "https://opentdb.com/api.php?amount=10&category=";
    url+=selectedCategory;
    url+="&difficulty=";
    url+=selectedDifficulty;
    url+="&type=multiple";
    console.log(url);

    sessionStorage.setItem("diff", selectedDifficulty);
    sessionStorage.setItem("url", url);
 
    window.location = "game.html";

    }
