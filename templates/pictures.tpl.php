

<?php foreach($pictures as $caption => $url) : ?>

    <label><?php print $caption; ?></label>
    <br />
    <img src="<?php print $url; ?>" alt="This image file would not load." />

<?php endforeach ?>