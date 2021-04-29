<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {

    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 30px;
        left: 0;
        background-color: #012169;
        overflow-x: hidden;
        /*transition: 0.5s;*/
        padding-top: 60px;
    }

    .sidenav a, .dropdown-btn {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 17px;
        color: #fff;
        display: block;
        text-transform: uppercase;
        font-weight: 600;
        /*transition: 0.4s;*/
    }

    .sidenav a:hover {
        color: #00a8e7;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    #main {
        /*transition: margin-left .5s;*/
        padding: 16px;
        padding-bottom:27px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }

    #title{
        text-align: center;
        font-size: xxx-large;
        line-height: normal;
        color: #00a8e7;
        font-weight: 600;
    }

    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #00a8e7;
        color: white;
        z-index: 2;
        text-decoration: none;
        font-size: 17px;
        text-align: center;
        min-height: 200px;
    }
    /* changes? */
    #stage-content{
        height: auto;
    }
    footer{
        display:none;
    }
    .dropdown-btn{
        background-color: #012169;
        border: none;
        font-size: xx-large;
    }
    .dropdown-btn:hover {
        color: #00a8e7;
    }
    .active {
        background-color: rgb(51 75 179);
        color: white;
    }
    .dropdown-container {
        display: none;
        background-color: #rgb(51 75 179);
        padding-left: 8px;
    }

    /* media  */
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
</style>
</head>

<div id="mySidenav" class="sidenav">
  <div id="title">LETTER<br/>LINKS</div>
  <a href="javascript:void(0)" class="closebtn" style="display:none;" onclick="closeNav()">&times;</a>
  <a href="about"><?php echo(t("menu_about"));?></a>
  <a href="faq"><?php echo(t("menu_faq"));?></a>
  <a href="help"><?php echo(t("menu_help"));?></a>
  <a href="resources"><?php echo(t("menu_resources"));?></a>
  <a href="activities"><?php echo(t("menu_activities"));?></a>
  <button class="dropdown-btn"><i class="fa fa-language"></i>
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <?php
        echo('<a href="'.$page.'?lang=en">'."en"."</a>");
        echo('<a href="'.$page.'?lang=es">'."es"."</a>");
    ?>
  </div>
</div>

<div id="main">
  <span  style="display:none; font-size:30px; cursor:pointer" onclick="openNav()">&#9776; open</span>
  <?php echo($content); ?>
</div>
<div class="footer">
    <a href="terms"><?php echo(t("footer_terms"));?></a>&nbsp;&nbsp;
    <a href="contact"><?php echo(t("footer_contact"));?></a>&nbsp;&nbsp;
    <a href="policy"><?php echo(t("footer_policy"));?></a>&nbsp;&nbsp;
    <a href="#"><?php echo(t("footer_store"));?></a>&nbsp;&nbsp;
</div>
<script>

function openNav() {
  document.getElementById("mySidenav").style.width = "20%";
  document.getElementById("main").style.marginLeft = "20%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

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
}

window.onload(openNav());
</script>


