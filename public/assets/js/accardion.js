// const hamburger = document.querySelector(".hamburger")
// const navMenu = document.querySelector(".nav_menu")
// hamburger.addEventListener("click", () => {
//     hamburger.classList.toggle("active")
//     navMenu.classList.toggle("active")
// })
document.querySelectorAll(".nav_link").forEach(n => n.addEventListener("click", () => {
    hamburger.classList.remove("active")
    navMenu.classList.remove("active")
}))
const accordionTitles = document.querySelectorAll(".accordion_title");
const deg = document.querySelectorAll(".deg");

accordionTitles.forEach((accordionTitle) => {
    accordionTitle.addEventListener("click", () => {
        const height = accordionTitle.nextElementSibling.scrollHeight;
        // console.log(accordionTitle.parentNode.querySelectorAll('.accordion_answer'));
        // console.log(accordionTitle.children[1]);
        accordionTitle.classList.toggle("active_header")
        accordionTitle.children[1].classList.toggle('rotated');

        accordionTitle.parentNode.querySelectorAll('.accordion_answer').forEach((e)=> {
            if (accordionTitle.classList.contains("active_header")) {
                e.style.maxHeight = `${height}px`;
            } else {
                e.style.maxHeight = "0px";
            }
        })
    })
})

var delet = document.getElementById("del");
function openDel() {
    delet.style.display = "block";
}
function closeDel() {
    delet.style.display = "none";
}
var clickStop = document.getElementById("a");
function stop() {
    clickStop.style.color = "#F28500";
}

