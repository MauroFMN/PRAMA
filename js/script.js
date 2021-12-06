console.log("Google")
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "navegador") {
        x.className += " responsive";
    } else {
        x.className = "navegador";
    }
};

window.onchange = function () {
    var todos = document.getElementById("reg").getElementsByTagName("form");
    for (i = 0; i <= todos.length; i++) {
        todos[i].class = "hide";
    }
    document.getElementById(event.target.value).class = "mostrar";

};

let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

if(closeBtn){
    
    closeBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("open");
    });
}
if(searchBtn){

    searchBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("open");
    });
}
