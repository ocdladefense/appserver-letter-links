


<div id="picture-list" class="picture-list">
    <?php foreach($pictures as $caption => $url) : ?>
        <div id="picture-item" class="picture-item" style="display: inline;">
            <label><?php print $caption; ?></label>
            <img src="<?php print $url; ?>" alt="This image file would not load." />
        </div>
    <?php endforeach ?>
</div>