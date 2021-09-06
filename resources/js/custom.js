window.toggleNavbar = function (collapseID) {
    document.getElementById(collapseID).classList.toggle("transform");
    document.getElementById(collapseID).classList.toggle("h-0"); // senza h-0 l'hamburger invisibile copre i bottoni
    document.getElementById(collapseID).classList.toggle("invisible"); // hidden rimuove la transition
}