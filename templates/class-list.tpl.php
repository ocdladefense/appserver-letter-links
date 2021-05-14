<div class="card-container">
    <div class="top-label">
		<span class="search"><i style="font-size:x-large;" class="fas fa-search"></i><span name="descriptions">search</span></span>
	</div>
    <div class="nameTitle">
		<h1 style="justify-content: left; display: block; padding-top: 10px;">Class List</h1>
        <h1 style="justify-content: left; display: inline-block; padding-top: 10px;"></h1>
        <h2 style="justify-content: left; display: inline-block; padding-top: 10px;"><?php print $teacher->getName(); ?></h2>
	</div>
	<div id="classImg" style="width: 100%; display:none;">
		<img src="https://letterlinks.highscope.org/Pictures/246_110810103117jaguar.jpg" alt="student-list-img" width="215px" height="215px">
	</div>

</div>

<div id="class-list" display="none">
    <ul>
    <?php foreach($classList as $class) : ?>
        <li>
            <input id="class<?php print $class->getId(); ?>" value="<?php print $class->getId(); ?>" hidden/>
            <label for="class<?php print $class->getId(); ?>">
                <a href="/classes/<?php print $class->getId(); ?>/students">
                    <img src="<?php print $class->getLetterLinkImageUrl(); ?>" />
                    <div class="class-caption"><?php print $class->getName(); ?></div>
                </a>
                <div class="class-caption">
                    <a href="#"><i class="fas fa-edit" style=" " ></i></a>
                </div>
            </label>
        </li>
        <?php endforeach ?>
    </ul>

</div>

<link rel="stylesheet" type="text/css" href="<?php print module_path(); ?>/assets/css/classList.css" />
<script src="<?php print module_path(); ?>/assets/js/classList.js" />