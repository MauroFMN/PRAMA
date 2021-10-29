function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "navegador") {
        x.className += " responsive";
    } else {
        x.className = "navegador";
    }
}

window.onchange = function () {
    var todos = document.getElementById("reg").getElementsByTagName("form");
    for (i = 0; i <= todos.length; i++) {
        todos[i].class = "hide";
    }
    document.getElementById(event.target.value).class = "mostrar";

};

let snav = document.querySelector(".snav");
let closeBtn = document.querySelector("#btnMenu");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", () => {
    snav.classList.toggle("open");
});

searchBtn.addEventListener("click", ()=>{
  snav.classList.toggle("open");
});