
<style type="text/css">
    #stage{
        width: unset !important;
    }
    #page{
        background-color: #00a3e0 !important;
    }
    .home-menu-item{
        height:auto !important;
        width:auto !important;
        text-transform: uppercase;
        font-size: 1.5rem !important;
        color: #fff;
    text-transform: uppercase;
    font-weight: 700;
    text-decoration: none;
    }
    .fas{
        font-size: 1.5rem !important;
    }
    #heading{
        text-transform: uppercase;
        width: 18%;
        text-align: left !important;
        font-size: 3em;
        color:rgba(17,34,109,1.0);
        height: auto !important;
    }
    #body{
        width:80%;
        float:  right;
    }
    #title{
        font-size: 14pt;
        text-transform: uppercase;
        font-weight: 700;
        color: #fc4c02;
    }
</style>
    <div id="stage" class="column column-middle">

    <div id="stage-content" style="text-align: unset; margin-left: auto !important;
    margin-right: auto !important; height: auto !important;">

            <ul class="main-menu home-menu" 
            >
            <li id="heading">
                letter links
            </li>
        <li class="home-menu-item"><i class="fas fa-home fa-2x" aria-hidden="true"></i><a href="/home">home</a></li>

        <li class="home-menu-item"><i class="fas fa-people-arrows fa-2x" aria-hidden="true"></i><a href="/covid" title="How HighScope is pivoting to meet COVID-19 challenges.">covid-19</a></li>

        <li class="home-menu-item"><i class="fas fa-book-open" aria-hidden="true"></i><a href="/user/documents" title="Read your publications">my<br>curriculum</a></li>

        <li class="home-menu-item"><i class="fas fa-calendar-day fa-2x" aria-hidden="true"></i><a href="/events">intl conference</a></li>

        <li class="home-menu-item"><i class="fas fa-video fa-2x" aria-hidden="true"></i><a href="/videos">videos</a></li>

        <li class="home-menu-item"><i class="fas fa-user-friends fa-2x" aria-hidden="true"></i><a href="/directory">community</a></li>

        <li class="home-menu-item"><i class="fas fa-comment-dots fa-2x" aria-hidden="true"></i><a href="/feedback">feedback</a></li>

        <li class="home-menu-item"><i class="fas fa-mobile-alt fa-2x" aria-hidden="true"></i><a href="/contact">contact us</a></li>
        </ul><script> document.body.classList.add("is-home");</script>							
    </div>
    <div id="body">
        <?php //var_dump($t);
            const BR = "<br/>";
            echo("<div id=\"title\">".$t->get('en','body_title')."</div>".BR);
            echo("<b>".$t->get('en','body_subtitle')."</b>".BR);
            echo("<p>".$t->get('en','body_paragraph1')."</p>");
        ?>
</div>

</div>

