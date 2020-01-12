function openNavBarChoise(evt, choiceName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("choice");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" orange", "");
    }
    document.getElementById(choiceName).style.display = "block";
    evt.currentTarget.className += " orange";
}


