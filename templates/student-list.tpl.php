
<div id="list-header" class="list-header">
    <h1>Hello José, here are your students for AM Class 1</h1><br />
</div>

<div id="form-container">
    <form id="list-action" action="/students/add">
        <input id="name" name"name" placeholder="Student Name" />
        <button>Add Student</button>
        <button id="print-button" class="button-right">Print Selected</button>
    </form>
</div>

<div id="class-list">

    <?php $row = "even-row"; ?>
    <?php foreach($students as $student) : ?>


        <div id="student-item" class="list-item <?php print $row; ?>">

            <input type="hidden" name="studentId" value="<?php print $student->getId(); ?>" />

            <label><?php print $student->getName(); ?></label><br />
            <img src="<?php print $student->getLetterLinkImageUrl(); ?>" />
            <label class="caption">Caption</label><br />

            <a href="/student/a125545852256gv5f4/update">Update</a>
            <a href="/student/azx255225563256mkj/delete">Delete</a>
            
            <div>
                <input type="checkbox" value="add to print list" />
                print
            </div>

        </div>

        <?php $row = $row == "even-row" ? "odd-row" : "even-row" ?>
    <?php endforeach ?>

</div>

<link rel="stylesheet" type="text/css" href="<?php print module_path(); ?>/assets/css/lists.css" />