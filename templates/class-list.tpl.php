<style>
    .list-header{
        margin: 10px 0 25px 0;
    }
    .item-image{
        display: inline-block;
    }
    img{
        max-height: 100px;
    }
    a{
        text-decoration: none;
    }
    .even-row{
        background-color: aquamarine;
    }
    .odd-row{
        background-color: lightblue;
    }
    .list-item{
        text-align: center;
        margin: 0.5%;
        display: inline-block;
        padding: 10px;
        width: 17%;
    }
    h1{
        font-size: 5Vmin;
    }
    .button-right{
        margin-left: 40px;
    }
    .caption{
        display: block;
    }

    @media only screen and (max-width:750px){

        .list-item{
            display: block;
            width: unset;
        }
    }

    @media only screen and (min-width:1100px){}
</style>

<div id="list-header" class="list-header">
    <h1>Hello <?php print $teacher->getName(); ?>, here are your classes</h1><br />
</div>

<div id="class-list">

    <?php $row = "even-row"; ?>
    <?php foreach($classList as $class) : ?>

        <div id="student-item" class="list-item <?php print $row; ?>">
        
            <input type="hidden" name="studentId" value="<?php print $class->getId(); ?>" />

            <label><?php print $class->getName(); ?></label><br />
            <img src="<?php print $class->getLetterLinkImageUrl(); ?>" />
            <label class="caption">Caption</label><br />

            <a href="/classes/class-123abc/students">edit student list</a><br />
            <a href="">edit this class</a>

        </div>

        <?php $row = $row == "even-row" ? "odd-row" : "even-row" ?>
    <?php endforeach ?>

</div>