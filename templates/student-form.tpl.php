
<style>
	
	.upload {
		display: none !important;
	}

</style>

<form enctype="multipart/form-data" id="upload-form" name="upload-form" method="post" action="/student/update" >

	<div class="form-item">
		<img src="<?php print $student->getLetterLinkImageUrl(); ?>" /><br />
		<a onClick="showUploadForm();">Change Image</a>
	</div>

	<div class="form-item">
		<label for="Name">Student Name</label><br />
		<input type="text" name="name" id="name" value="<?php print $student->getName(); ?>" placeholder="Enter student name" />
	</div>

	<div class="form-item">
		<label for="Name">Letter Link Caption</label><br />
		<input type="text" name="caption" id="caption" value="<?php print $student->getLetterLinkCaption(); ?>" placeholder="Enter your picture caption." />
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

