<script type="text/javascript">
    function checkPrint(id){
        document.getElementById(id).checked=!document.getElementById(id).checked;
    }
</script>

<div class="card-container">
    <div class="top-label">
		<span class="search"><i style="font-size:x-large;" class="fas fa-search"></i><span name="descriptions">search</span></span>
	</div>


    <div class="nameTitle">
		<h1 style="justify-content: left; display: inline-block; padding-top: 10px;">Student List</h1></br>
        <h1 style="justify-content: left; display: inline-block; padding-top: 10px;">9 AM</h1><h2 style="justify-content: left; display: inline-block; padding-top: 10px;">Class</h2>
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
                <a href="/student/a125545852256gv5f4/update">
                    <img src="<?php print $student->getLetterLinkImageUrl(); ?>" />
                    <div class="student-caption"><?php print $student->getName(); ?></div>
                    <i class="fas fa-edit" style="color:rgba(210, 165, 80); font-size:x-large;" ></i>
                </a>
            </label>
        </li>
        <?php endforeach ?>
    </ul>

</div>







<link rel="stylesheet" type="text/css" href="<?php print module_path(); ?>/assets/css/studentList.css" />
<script src="<?php print module_path(); ?>/assets/js/studentList.js" />
