
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
<script src="<?php print module_path(); ?>/assets/js/dragDrop.js" />

