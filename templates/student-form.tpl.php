
<style>
	.image-area{
		text-align:center;
	}
	.image-area button{

		width: 30%;
		border-radius: 20px;
		margin: 10px;
	}
	.upload {
		display: none !important;
	}

</style>


<div class="card-container">
    <div class="top-label">
		<span class="student"><i class="fas fa-apple-alt"></i> Student</span>
	</div>
	<div class="nameTitle">
	<script type="text/javascript">
		function editName(){
			document.getElementById("editName").style.display='block';
			document.getElementsByClassName("nameTitle")[0].style.display='none';
		}
	</script>
		<h1 style="display: inline-block;"><?php print $student->getName(); ?> </h1><i id="editStudent" class="fas fa-pencil-alt" onclick="editName();"></i>
	</div>
	<div id="editName">
		<label for="Name">Student Name</label><br />
		<input type="text" class="name" name="name" id="name" value="<?php print $student->getName(); ?>" placeholder="Change Name Here:" />
	</div>

	
    <img src="<?php print $student->getLetterLinkImageUrl(); ?>" alt="student-img">

    <h5><?php print t("language")?></h5>
	<div class="toggle-radio">
		<input type="radio" name="default" id="default_Option1" value="Option1">
		<label for="default_Option1"><?php print t("english")?></label>

		<input type="radio" name="default" id="default_Option2" value="Option2" checked>
		<label for="default_Option2"><?php print t("spanish")?></label>

		<!-- <input type="radio" name="default" id="default_Option3" value="Option3">
		<label for="default_Option3">Option 3</label> -->
	</div>
    <!-- <p>User interface designer and <br> front-end developer</p>
    <div class="buttons">
        <button class="primary">
            Message
        </button>
        <button class="primary ghost">
            Following
        </button>
    </div> -->
    <div class="skills">
        <h6>Classes:</h6>
        <ul style="font-size: 13pt;">
            <li>Class1</li>
            <li>Class2 morning</li>
            <li>Class3 that is the same as class5 but no stinky jeff</li>
            <li>Class4 but similar to class2 but without jake</li>
            <li>Class5 class but everyone gets spanked</li>
        </ul>
    </div>
</div>

<form enctype="multipart/form-data" id="upload-form" name="upload-form" method="post" action="/student/update" >

	<div class="form-item image-area">
		<img src="<?php print $student->getLetterLinkImageUrl(); ?>" /><br />
		<label><?php print $student->getLetterLinkCaption(); ?></label><br />
		<button onClick="showUploadForm();">Upload a new Image</button>
		<button onClick="showUploadForm();">Select an existing image</button><br />
	</div>

	<div class="form-item">
		<label for="Name">Student Name</label><br />
		<input type="text" name="name" id="name" value="<?php print $student->getName(); ?>" placeholder="Enter student name" />
	</div>

	<input type="hidden" name="recordId" id="recordId" value="<?php print $student->getId(); ?>" />
	<input type="hidden" name="letterLinkUrl" value="<?php print $student->getLetterLinkImageUrl(); ?>" />

	<div class="form-item">
		<input id="submit-button" type="submit" value="Upload" />
	</div>
	
</form>

<script>

	function showUploadForm(){

		let uploadElements = document.getElementsByClassName("upload");

		for(let i = 0; i < uploadElements.length; i++){

			uploadElements[i].classList.remove("upload");
		}
	}

</script>

<link rel="stylesheet" type="text/css" href="<?php print module_path(); ?>/assets/css/dragDrop.css" />
<link rel="stylesheet" type="text/css" href="<?php print module_path(); ?>/assets/css/student.css" />
<script src="<?php print module_path(); ?>/assets/js/dragDrop.js" />
<script src="<?php print module_path(); ?>/assets/js/student.js" />

