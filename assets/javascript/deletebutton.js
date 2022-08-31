// deletes items on the back- and front-end
// i know, no confirmation dialogue, should have been better

var buttons = document.getElementsByTagName("button");
var buttonsCount = buttons.length;
for (var i = 0; i <= buttonsCount; i += 1) {
    buttons[i].onclick = function (e) {
        const xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../delete/" + this.id);
        xhttp.send();
        this.closest("div").remove();
    };
}