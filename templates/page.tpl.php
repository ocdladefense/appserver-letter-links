<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

    .sidenav {
        height: 100%;
        width: 20%;
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
        padding-bottom:127px;
        margin-left: 20%;
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
        font-size: 17px;
        text-align: center;
        min-height: 100px;
        padding-top: 20px;
    }
    .footer a{
        text-decoration: none !important;
        color: white !important;
        text-transform: uppercase;
        letter-spacing: -1px;


    }

    p{
        padding-top: 10px;
        padding-bottom: 10px;
    }
    ol{
        padding: 10px;
    }
    ul{
        padding: 10px;
    }
    .title {
        font-size: 14pt;
        text-transform: uppercase;
        font-weight: 700;
        color: #fc4c02;
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
        background-color: rgb(51 75 179);
        padding-left: 8px;
    }

    /* media  */
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
    @media only screen and (min-width: 700px) {
        #openbtn{display:none;}
        .sidenav{width:20%}
        #main{margin-left:20%}
        
    }

    @media only screen and (max-width: 959px) {
        #title{font-size: 27pt;}
        #main{font-size: larger;}
        
    }
    @media only screen and (max-width: 700px) {
        #title{font-size: 23pt;}
            .sidenav a{font-size: 12pt; 
            padding-top:15px;
            padding-left:20px;
        }
    }
    @media only screen and (max-width: 613px) {

            .sidenav {width: 0}
            #main   {margin-left:0 !important;}
            .closebtn {
                display:unset !important;
                top: 37px !important;
                right: 9px !important;
            }
            #openbtn    {
                background: #012169;
                color: white;
                padding: 11px 15px;
                border-radius: 25px;
                box-shadow: 0px 17px 10px -10px rgba(0,0,0,0.4);
                display:unset !important;
                transition: all ease-in-out 300ms;
                position: fixed;
                top: 56px;
                z-index: 11;
                right: 10px;
            }
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

<div id="openbtn" style="display:none;">
    <span style="font-size:30px; cursor:pointer" onclick="openNav('40%')">&#9776; </span>
</div>

<div id="main">
  <?php echo($content); ?>
</div>
<div class="footer">
    <a href="terms"><?php echo(t("footer_terms"));?></a>&nbsp;
    <a href="contact"><?php echo(t("footer_contact"));?></a>&nbsp;
    <a href="policy"><?php echo(t("footer_policy"));?></a>&nbsp;
    <a href="#"><?php echo(t("footer_store"));?></a>&nbsp;
</div>
<script>

function openNav(amount = "20%") {
  document.getElementById("mySidenav").style.width = amount;
  document.getElementById("main").style.marginLeft = amount;
  document.getElementById("openbtn").style.display="none !important";  
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.getElementById("openbtn").style.display="unset"; 
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
</script>


