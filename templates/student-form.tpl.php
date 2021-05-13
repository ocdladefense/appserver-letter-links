<script type="text/javascript">
	function editName(){
		document.getElementById("name").style.display="none";
		document.getElementById("editName").style.display='inline-block';
		//document.getElementById("editStudent").style.display='none';
		//document.getElementById("cancelStudent").style.display='inline-block';
		//document.getElementById("studentForm").style.display='unset';
		//document.getElementById("lang").style.display='none';
		
	}
	function cancel(){
		document.getElementById("editName").style.display='none';
		//document.getElementById("editStudent").style.display='unset';
		//document.getElementById("cancelStudent").style.display='none';
		//document.getElementById("studentForm").style.display='none';
		//document.getElementById("lang").style.display='unset';
	}
</script>



<form enctype="multipart/form-data" id="upload-form" class="card-container" name="upload-form" method="post" action="/student/update" >

	<div class="top-label">
		<span class="delete"><a href="/student/<?php print $student->getId(); ?>/delete"><i style="font-size: x-large;" class="fas fa-trash-alt"></i></a></span>
	</div>

	<div class="nameTitle">
		<h1 id="name" style="display: inline-block;" onclick="editName()"><?php print $student->getName(); ?> </h1>
		<div id="editName">
			<input type="text" class="name" name="name" id="name" value="<?php print $student->getName(); ?>" placeholder="<?php print t("name")?>:" />
		</div>

		<!-- <div id="editStudent" onclick="editName();"><i style="font-size: x-large;" class="fas fa-pencil-alt" ></i></div> -->
		<div id="cancelStudent" onclick="cancel();"><i  style="font-size: x-large;" class="fa fa-times" aria-hidden="true"></i></div>
		<!-- <br/><h4 style="display: inline-block;"><?php print $student->getLetterLinkCaption(); ?></h4>
		<div id="editPicture"><i style="font-size: x-large; display: inline-block;" class="fas fa-image"></i><span name="descriptions">Edit Picture</span></div> -->
	</div>

	<div style="width: 100%;">
		<img src="<?php print $student->getLetterLinkImageUrl(); ?>" alt="student-img">
		
	</div>



	<label id="lang" for="Name" style="padding-top: 10px; padding-bottom: 10px; text-transform: capitalize;"><?php print t("language")?>: <?php print t($student->getLanguage())?></label>
	
	<div id="studentForm" style="display: none; padding:10px 0px 10px 0px;">
		<label for="Name" style="padding-top: 10px; padding-bottom: 10px; text-transform: capitalize;"><?php print t("language")?>:</label>
		</br>

		<div class="toggle-radio">
			<input type="radio" name="default" id="default_Option1" value="Option1" checked>
			<label for="default_Option1"><?php print t($student->getLanguage())?></label>
			<input type="radio" name="default" id="default_Option2" value="Option2" >
			<label for="default_Option2"><?php print t("spanish")?></label>
			<!-- <input type="radio" name="default" id="default_Option3" value="Option3">
			<label for="default_Option3">Option 3</label> -->
		</div>
	
	</div>
    <div class="skills">
        <h3><?php print t("Other Classes")?>:</h3>
        <ul style="font-size: 13pt;">
            <li>Class afternoon</li>
            <li>Class2 morning</li>
            <li>Class3 midnight</li>
            <li>Class twighlight</li>
        </ul>
    </div>

	<input type="hidden" name="recordId" id="recordId" value="<?php print $student->getId(); ?>" />
	<input type="hidden" name="letterLinkUrl" value="<?php print $student->getLetterLinkImageUrl(); ?>" />

	<div class="form-item">
		<input id="submit-button" type="submit" value="Upload" />
	</div>
	
</form>


<link rel="stylesheet" type="text/css" href="<?php print module_path(); ?>/assets/css/dragDrop.css" />
<link rel="stylesheet" type="text/css" href="<?php print module_path(); ?>/assets/css/student.css" />
<script src="<?php print module_path(); ?>/assets/js/dragDrop.js" />
<script src="<?php print module_path(); ?>/assets/js/student.js" />

