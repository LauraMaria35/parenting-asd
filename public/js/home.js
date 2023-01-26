let menuIcon = document.getElementById("menuIcon")
let section2 = document.getElementById("section2");
menuIcon.onclick = () => {
    section2.style.display = "block";
}

let menu = document.querySelector("#menu");
let searchBar = document.querySelector(".searchBar");
let search = document.querySelector("#search");
let appear = document.querySelector(".appear");
search.addEventListener("click", function() {
    menu.style.display = "none",
        searchBar.classList.add("appear");

})

function backToMenu() {
    menu.style.display = "flex";
    searchBar.classList.remove("appear");
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}

function Myfunction() {
    let input = document.querySelector(".searchBar").value
    input = input.toLowerCase();
    let x = document.getElementsByClassName('animals'); // inlocuiesc cu ...

    for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display = "none";
        } else {
            x[i].style.display = "list-item";
        }
    }
}