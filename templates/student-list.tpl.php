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
    <?php foreach($studentList as $sl) : ?>

        <div id="class-item" class="class-item <?php print $row; ?>">
            <img id="class-image" src="<?php print $sl["image"]; ?>" />

            <div id="class-info" class="class-info">
                <label><?php print $sl["name"]; ?></label><br />
                <a href="">edit student</a><br />
            </div>
        </div>

        <?php $row = $row == "even-row" ? "odd-row" : "even-row" ?>
    <?php endforeach ?>

</div>