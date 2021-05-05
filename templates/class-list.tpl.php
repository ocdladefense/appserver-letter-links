
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

<link rel="stylesheet" type="text/css" href="<?php print module_path(); ?>/assets/css/lists.css" />