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
        padding: 3px;
    }
    .item-info{
        display: inline-block;
        float: right;
    }
    .item-info a{
        float: right;
    }
    .checkbox{
        display: inline;
        margin-left: 10px;
    }
    h1{
        font-size: 5Vmin;
    }
    .button-right{
        margin-left: 40px;
    }

    @media only screen and (max-width:750px){

        img{
            max-height: 21Vmin;
        }
        .item-image{
            max-width:30%;
        }
        .checkbox{
            margin: 0 0 0 10%   ;
        }
    }

    @media only screen and (min-width:1100px){

        .list-item{
            width: 20%;
            margin: 0.5%;
            display: inline-block;
            padding: 5px;
        }
    }
</style>

<div id="list-header" class="list-header">
    <h1>Hello <?php print $teacher->getName(); ?>, here are your classes</h1><br />
</div>

<div id="class-list">

    <?php $row = "even-row"; ?>
    <?php foreach($classList as $class) : ?>

        <div id="list-item" class="list-item <?php print $row; ?>">
            <input type="hidden" name="Id" value="<?php print $class->getId(); ?>" />

            <div id="item-image" class="item-image">
                Caption<br />
                <img class="image" src="<?php print $class->getLetterLinkImageUrl(); ?>" />
            </div> 

            <div id="item-info" class="item-info">
                <label><?php print $class->getName(); ?></label><br />
                <a href="/classes/class-123abc/students">edit student list</a><br />
                <a href="">edit this class</a>
            </div>

        </div>

        <?php $row = $row == "even-row" ? "odd-row" : "even-row" ?>
    <?php endforeach ?>

</div>