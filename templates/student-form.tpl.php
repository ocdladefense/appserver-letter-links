
<h1>Student Form</h1>
<form id="student-form" action="/student/do/update">
    <input name="name" value="<?php print $student->getName(); ?>" />
    <img src="<?php print $student->getLetterLinkImageUrl(); ?>" />
    <button>update image</button>
</form>