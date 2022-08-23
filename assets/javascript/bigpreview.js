//partly from w3schools

var modal = document.getElementById("myModal");
var modalContent = document.getElementsByClassName("modal-content")[0];
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
    modal.style.display = "none";
  }
  
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  function clearModal (){
    modalContent.innerhtml = "";
  }

var images = document.getElementsByTagName("img");
var imageCount = images.length;
for (var j = 0; j <= imageCount; j += 1) {
    images[j].onclick = function(e) {
        alert(this.id);
        modal.style.display = "block";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            modalContent.innerHTML = "<img src="+this.response+" >";
          }
        };
        xhttp.open("GET", "../view/"+this.id, true);
        xhttp.send();
    };
}

