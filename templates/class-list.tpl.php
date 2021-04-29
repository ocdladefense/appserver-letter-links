<style>
    img{
        max-height: 100px;
    }
    .even-row{
        background-color: aquamarine;
    }
    .odd-row{
        background-color: lightblue;
    }
    .class-item{
        padding: 5px, 0, 5px, 0;
    }
    .class-info{
        display: inline-block;
    }
</style>

<div id="class-list">

    <?php $row = "even-row"; ?>
    <?php foreach($classList as $cl) : ?>

        <div id="class-item" class="class-item <?php print $row; ?>">
            <img id="class-image" src="<?php print $cl["image"]; ?>" />

            <div id="class-info" class="class-info">
                <label><?php print $cl["name"]; ?></label><br />
                <a href="/classes/someId/students">edit student list</a><br />
                <a href="">edit this class</a>
            </div>
        </div>

        <?php $row = $row == "even-row" ? "odd-row" : "even-row" ?>
    <?php endforeach ?>

</div>