const images = Array.from(document.getElementsByClassName("image"));
console.log("1");
console.log(images);
//adding onclick events for all images.        
images.forEach((img => {
    img.addEventListener('click', (e) => {
        console.log(e.target);
        if(img.getAttribute("data-img")!=null){
            //adding the selected image dataset value to localstorage
           localStorage.setItem("img", img.getAttribute("data-img"));   
        }

    });
}));