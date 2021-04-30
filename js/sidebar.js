
function openNav(amount = "20%") {
    document.getElementById("mySidenav").style.width = amount;
    document.getElementById("main").style.marginLeft = amount;
    document.getElementById("openbtn").innerHTML = "&times;";
    document.getElementById("openbtn").style.fontSize.length = 25;
    document.getElementById("main").style.backgroundColor = "rgba(0,0,0,0.4)";
    document.getElementById("openbtn").onclick = closeNav;  
  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    //document.getElementById("openbtn").style.display="unset";
    document.getElementById("openbtn").innerHTML = "&#9776;";
    document.getElementById("openbtn").style.fontSize.length = 20;
    document.getElementById("main").style.backgroundColor = "rgba(0,0,0,0)";
    document.getElementById("openbtn").onclick = function () { openNav("40%")}; 
  }

  window.onload = function(){
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    
    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      } else {
      dropdownContent.style.display = "block";
      }
      });
    };
  }