const menuIcon = document.querySelector(".hamburger_menu");
const navbar = document.querySelector(".navbar");

menuIcon.addEventListener("click", () => {
    navbar.classList.toggle("change")
});


var slider = document.getElementById("slider");


function openSliader() {
    slider.style.display = "block";
    navbar.classList.toggle("change")
}

function closeSliader() {
    slider.style.display = "none";
}



var slider2 = document.getElementById("slider2");

function openSliader2() {
    slider2.style.display = "block";
    navbar.classList.toggle("change")
}

function closeSliader2() {
    slider2.style.display = "none";
}