window.toggleNavbar = function (collapseID) {
    document.getElementById(collapseID).classList.toggle("h-0");
    document.getElementById(collapseID).classList.toggle("block");
    document.getElementById(collapseID).classList.toggle("transform");
}