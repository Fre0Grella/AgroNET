const yellow = "#FDE918";
const green = "#97503A";
const brown = "#226037";
let nav = document.getElementById("botBar");
var icons = document.getElementsByClassName("change");
const slider = document.getElementById("myRange");
slider.addEventListener("input", function(event) {
    var color = slider.value;
    if (color == 2) {
        nav.style.backgroundColor = yellow;
        for (i = 0; i < icons.length; i++) {
            icons[i].setAttribute("style","filter: invert(100%);");
        }
    }
    if (color == 1) {
        nav.style.backgroundColor = green;
        for (i = 0; i < icons.length; i++) {
            icons[i].setAttribute("style","filter: invert(0%);");
        }
    }
    if (color == 3) {
        nav.style.backgroundColor = brown;
        for (i = 0; i < icons.length; i++) {
            icons[i].setAttribute("style","filter: invert(0%);");
        }
    }
})
 