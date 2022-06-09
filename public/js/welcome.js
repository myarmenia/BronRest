const hamburger = document.querySelector(".hamburger")
const navMenu = document.querySelector(".nav_menu")


hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active")
    navMenu.classList.toggle("active")
})

document.querySelectorAll(".nav_link").forEach(n => n.addEventListener("click", () => {
    hamburger.classList.remove("active")
    navMenu.classList.remove("active")
}))


//slider----------------------------------------------------


var slider = document.getElementById("slider");


function openSliader() {
    slider.style.display = "block";
}

function closeSliader() {
    slider.style.display = "none";
}


// -------------------------------------------------


var slider2 = document.getElementById("slider2");

function openSliader2() {
    slider2.style.display = "block";
}

function closeSliader2() {
    slider2.style.display = "none";
}