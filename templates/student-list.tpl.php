<script type="text/javascript">
    function checkPrint(id){
        document.getElementById(id).checked=!document.getElementById(id).checked;
    }
</script>

<div class="card-container">

    <div class="top-label">
		<!-- <span class="search"><i style="font-size:x-large;" class="fas fa-search"></i><span name="descriptions">search</span></span> -->
        <a title="Add a Student" class="btn" href="#open-modal">Student<i class="fas fa-plus"></i></a>
	</div>


    <div class="nameTitle">
		<h1 style="justify-content: left; display: inline-block; padding-top: 10px;">Student List</h1></br>
        <h1 style="justify-content: left; display: inline-block; padding-top: 10px;"><?php print $class->getName(); ?></h1><h2 style="justify-content: left; display: inline-block; padding-top: 10px;"></h2>
	</div>
	<div id="classImg" style="width: 100%; display:none;">
		<img src="https://letterlinks.highscope.org/Pictures/246_110810103117jaguar.jpg" alt="student-list-img" width="215px" height="215px">
	</div>
    <ul>
        <?php foreach($students as $student) : ?>
        <li>
            <div class="student-label">
                <i class="fas fa-print" onclick="checkPrint('student<?php print $student->getId(); ?>')"></i>
                
            </div>

            <input type="checkbox" id="student<?php print $student->getId(); ?>" />
            <label for="student<?php print $student->getId(); ?>">
                <a href="/student/<?php print $student->getId(); ?>">
                    <img src="<?php print $student->getLetterLinkImageUrl(); ?>" />
                    <div class="student-caption"><?php print $student->getName(); ?></div>
                    <i class="fas fa-edit" style="color:rgba(210, 165, 80); font-size:x-large;" ></i>
                </a>
            </label>
        </li>
        <?php endforeach ?>
    </ul>

</div>

<div id="open-modal" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close"><i class="far fa-window-close"></i></a>
        <h1>Add a Student</h1>
            <!-- <div>A CSS-only modal based on the :target pseudo-class. Hope you find it helpful.</div>
            <div><small>Check out</small></div>
            <a href="https://aminoeditor.com" target="_blank">👉 Amino: Live CSS Editor for Chrome</div> -->


            <form enctype="multipart/form-data" id="upload-form" class="" name="upload-form" method="post" action="/add/student" >
                <a class="tooltips" data-toggle="tooltip" data-placement="top" title="Add Student">
                    Student Name<br />
                    <input type="text" id="Name" name="Name" />
                    <input type="hidden" name="Class__c" value="<?php print $class->getId(); ?>" />
                    
                    <button type="submit" onclick="return confirm('Are you sure to add this student ?');" style="text-shadow: -1px 1px 2px grey; color: #75e049; display:block; font-size:x-large; border: 0; background: none;">
                        <i class="fas fa-check-circle"></i><span>Submit</span>
                    </button>
          
                 </a>
            </form>

    </div>
</div>






<link rel="stylesheet" type="text/css" href="<?php print module_path(); ?>/assets/css/classList.css" />
<link rel="stylesheet" type="text/css" href="<?php print module_path(); ?>/assets/css/studentList.css" />
<script src="<?php print module_path(); ?>/assets/js/studentList.js" />
