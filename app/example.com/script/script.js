let elements = Array.from(document.getElementsByClassName("DEATH")); //hämtar alla delete-länkar från Admin Dashboard
elements.forEach( element => {
    element.addEventListener("click", (event) =>{ //ett inlägg tas bort när dess "delete"-knapp trycks
        const posid = element.dataset.id; //hämtar inläggets id genom attributet "data-id" i Admin Dashboard
        event.preventDefault(); //stoppar länken från att skicka användaren till en annan sida
        fetch("delete.php?id=" + posid) //skickar ett HTTP-GET-Request och tar bort inlägget
        .then(function(){
            const post= document.getElementById("post-"+posid);
            post.innerHTML = ""; //tömmer html-koden för inlägget som just togs bort
        })
    })
});