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

            <div id="item-image" class="item-image">
            The Caption<br />
                <img src="<?php print $student->getLetterLinkImageUrl(); ?>" />
            </div> 

            <div id="student-info" class="item-info">
                <label><?php print $student->getName(); ?></label><br />
                <a href="/student/a125545852256gv5f4/update">Update Student</a><br />
                <a href="/student/azx255225563256mkj/delete">Delete Student</a><br />
            </div>

            <div class="checkbox">
                <input type="checkbox" value="add to print list" />
                print
            </div><br />  
        </div>

        <?php $row = $row == "even-row" ? "odd-row" : "even-row" ?>
    <?php endforeach ?>

</div>