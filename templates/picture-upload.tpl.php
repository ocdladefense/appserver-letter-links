
<form enctype="multipart/form-data" id="upload-form" name="upload-form" method="post" action="/pictures/upload" >

	<div class="form-item">
		<label for="Caption">Caption</label><br />
		<input type="text" name="Caption" id="Caption" value="<?php print $doc["Title"]; ?>" placeholder="Enter your picture caption." />
	</div>

	<div class="form-item">
		<label for="Language">Select a language</label><br />
		<select id="Language" name="Language">
			<option value="en">English</option>
			<option value="es">Spanish</option>
		</select>
	</div>

	<div class="form-item">
		<label for="LetterSound">Select a letter sound to associate the picture with</label><br />
		<select id="LetterSound" name="LetterSound">
			<option value="A-Ar (Example: Aaron)">A-Ar (Example: Aaron)</option>
			<option value="A-Ar (Example: Arthur)">A-Ar (Example: Arthur)</option>
			<option value="A-Au (Example: Audrey)">A-Au (Example: Audrey)</option>
			<option value="A-Long A (Example: Ada)">A-Long A (Example: Ada)</option>
			<option value="A-Schwa (Example: Alicia)">A-Schwa (Example: Alicia)</option>
			<option value="A-Short A (Example: Andrea)">A-Short A(Example: Andrea)</option>
		</select>
	</div>

	<?php if($doc != null) : ?>
		<div class="form-item">
			<label>File Type: <?php print $doc["FileType"] ?></label><br />
			<label>File Extension: <?php print $doc["FileExtension"] ?></label><br />
		</div>
	<?php endif ?>

	<input type="hidden" name="ContentDocumentId" id="ContentDocumentId" value="<?php print $doc["Id"]; ?>" />
	<input type="hidden" name="recordId" id="recordId" value="<?php print $recordId; ?>" />

	<div class="form-item">
		<input id="submit-button" type="submit" value="Upload" />
	</div>
	
</form>

<link rel="stylesheet" type="text/css" href="/modules/sobjectContentManager/assets/css/dragDrop.css" />
<script src="/modules/sobjectContentManager/assets/js/dragDrop.js" />