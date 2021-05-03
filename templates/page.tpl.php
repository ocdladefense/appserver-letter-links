

<div id="mySidenav" class="sidenav">
  <div id="title">LETTER<br/>LINKS</div>
  <!--<a href="javascript:void(0)" class="closebtn" id="closebtn" style="display:none;" onclick="closeNav">&times;</a>-->
  <a href="letterlinks/login">Login</a>
  <a href="letterlinks/content/about"><?php echo(t("menu_about"));?></a>
  <a href="letterlinks/content/faq"><?php echo(t("menu_faq"));?></a>
  <a href="letterlinks/content/help"><?php echo(t("menu_help"));?></a>
  <a href="letterlinks/content/resources"><?php echo(t("menu_resources"));?></a>
  <a href="letterlinks/content/activities"><?php echo(t("menu_activities"));?></a>
  <button class="dropdown-btn"><i class="fa fa-language"></i>
    <i class="fa fa-caret-down"></i>&nbsp;&nbsp;
  </button>
  <div class="dropdown-container">
    <?php
        echo('<a href="'.$page.'?lang=en">'."en"."</a>");
        echo('<a href="'.$page.'?lang=es">'."es"."</a>");
    ?>
  </div>
</div>

<span id="openbtn" style=" display:none; font-size:20pt; cursor:pointer" onclick="openNav('40%')">&#9776;</span>

<div id="main">
  <?php echo $content; ?>
</div>






