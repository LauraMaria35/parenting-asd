let menuIcon = document.querySelector("#menuIcon");
let extendedMenu = document.querySelector(".extendedMenu");
menuIcon.addEventListener("click", () => {
    extendedMenu.style.display = "block";
})

let menu = document.querySelector("#menu");
let searchBar = document.querySelector(".searchBar");
let search = document.querySelector("#search");
let appear = document.querySelector(".appear");
search.addEventListener("click", () => {
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

var changeBtn = document.getElementsByClassName("changeBtn");
var i;

for (i = 0; i < changeBtn.length; i++) {
    changeBtn[i].addEventListener("click", function() {
        /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var formular = this.nextElementSibling;
        if (formular.style.display === "block") {
            formular.style.display = "none";
        } else {
            formular.style.display = "block";
        }
    });
}

let notif = document.querySelector(".notif")
let counter1 = document.querySelector(".counter1")

if (counter1){
notif.addEventListener("click", () => {
    counter1.innerHTML = "O";
 })}