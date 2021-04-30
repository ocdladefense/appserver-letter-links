<style>
    .list-header{
        margin: 10px 0 25px 0;
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
        padding: 2px 0 0 0;
    }
    .item-info{
        display: inline-block;
    }
    .checkbox{
        display: inline;
        margin-left: 10px;
    }
    h1{
        font-size: 5Vmin;
    }
    .button-right{
        float: right;
        margin-right: 20px;
    }

    @media only screen and (max-width:750px){

        img{
            max-height: 21Vmin;
        }
        .checkbox{
            margin-left: 5Vmin;
        }
    }
</style>

<div id="list-header" class="list-header">
    <h1>Hello "Teacher Name", here are your students for Daily Morning Class 1</h1><br />
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
        <input type="hidden" name="studentId" value="<?php print $student->getId(); ?>" />

        <div id="student-item" class="list-item <?php print $row; ?>">
            <img id="class-image" src="<?php print $student->getLetterLinkImageUrl(); ?>" />

            <div id="student-info" class="item-info">
                <label><?php print $student->getName(); ?></label>
                <div class="checkbox">
                    <input type="checkbox" value="add to print list" />
                    <label>Add to print list</label>
                </div><br />
                <a href="">Update Image</a><br />
                <a href="">Update Student Name</a><br />
                <a href="">Delete Student</a><br />
            </div>
        </div>

        <?php $row = $row == "even-row" ? "odd-row" : "even-row" ?>
    <?php endforeach ?>

</div>