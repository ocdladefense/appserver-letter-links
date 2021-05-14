<div class="card-container">
    <div class="top-label">
        <a title="Search" href="#"> <i class="fas fa-search"></i></a>
        <a title="Add a Class" class="btn" href="#open-modal"><i class="fas fa-plus"></i></a>
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
                <a href="/classes/class-123abc/students">
                    <img src="<?php print $class->getLetterLinkImageUrl(); ?>" />
                    <div class="class-caption"><?php print $class->getName(); ?></div>
                </a>
                <div class="class-caption">
                    <a href="#"><i class="fas fa-edit"></i></a>
                </div>
            </label>
        </li>
        <?php endforeach ?>
    </ul>

</div>
<div class="container">
  <div class="interior">
    
  </div>
</div>

<div id="open-modal" class="modal-window">
    <div>
        <a href="#" title="Close" class="modal-close"><i class="far fa-window-close"></i></a>
        <h1>Add a class</h1>
            <!-- <div>A CSS-only modal based on the :target pseudo-class. Hope you find it helpful.</div>
            <div><small>Check out</small></div>
            <a href="https://aminoeditor.com" target="_blank">👉 Amino: Live CSS Editor for Chrome</div> -->


            <form enctype="multipart/form-data" id="upload-form" class="" name="upload-form" method="post" action="/add/class" >
                <a class="tooltips" data-toggle="tooltip" data-placement="top" title="Submit Class">
                    <h2>testing using inputs</h2>
                    <input type="LetterLinkImageURL__c" value="/modules/appserver-letter-links/content/prototypeImages/tiger.jpg">
                    <input type="Name" value="Test Adding A Class">
                    
                    <button type="submit" onclick="return confirm('Are you sure to add this class ?');" style="text-shadow: -1px 1px 2px grey; color: #75e049; display:block; font-size:x-large; border: 0; background: none;">
                        <i class="fas fa-check-circle"></i><span>Submit</span>
                    </button>
          
                 </a>
            </form>

    </div>
</div>

<link rel="stylesheet" type="text/css" href="<?php print module_path(); ?>/assets/css/classList.css" />
<script src="<?php print module_path(); ?>/assets/js/classList.js" />

    <link rel="stylesheet" type="text/css" href="/content/libraries/file/dragDrop/css/dragDrop.css"></link>
    <script src="/content/libraries/file/dragDrop/js/DragDropFileUpload.js"></script>
    <script src="<?php print module_path(); ?>/assets/js/ClassListApp.js"></script>