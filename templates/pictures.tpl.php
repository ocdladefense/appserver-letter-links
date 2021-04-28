


<div id="picture-list" class="picture-list">
    <?php foreach($pictures as $caption => $url) : ?>
        <div id="picture-item" class="picture-item" style="display: inline-block; text-align: center;">
            <label><?php print $caption; ?></label>
            <img src="<?php print $url; ?>" style="display: block;" alt="This image file would not load." />
        </div>
    <?php endforeach ?>
</div>