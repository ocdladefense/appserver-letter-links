<?php

// use Salesforce\Database as Database;

class LetterLinksModule extends Module
{


	public function __construct()
	{
		parent::__construct();
	}

	public function showPage($page){
		$loadFromFile = true;
		$language = getDefaultLanguage();
		$content = t($page,$language,$loadFromFile);

		$tpl = new TestTemplate("page");

		$tpl->addPath(__DIR__ . "/templates");

		$tpl->bind("content",$content);
		$tpl->bind("page",$page);
		return $tpl;
	}

	public function login()
	{
		$homeFiles = __DIR__ . '/src/login';
        $tpl = new Template("login");
		$tpl->addPath(__DIR__ . "/templates");
		//$tpl->addStyles($homeFiles."/styles");
		//$tpl->addScripts($homeFiles."/scripts");
        return $tpl->render(array(
			"files" => $homeFiles
		));
    }

	///////////////////////////	PICTURE MANAGER FUNCTIONALITY	//////////////////////////////////////////////////////

	public function pictureListTpl($lang){
		
	}


	public function getPictures($lang, $letter, $sound){

		$pictures = PictureManager::getPictures($lang, $letter, $sound);

		
		$tpl = new Template("pictures");
		$tpl->addPath(__DIR__ . "/templates");

		return $tpl->render(array("pictures" => $pictures));
	}

	public function pictureUploadForm() {

		$tpl = new Template("picture-upload");
		$tpl->addPath(__DIR__ . "/templates");

		return $tpl->render(array("recordId" => "some user id"));
	}

	public function uploadPictures() {

		$path = __DIR__ . "/content/images/{$_POST['Language']}/{$_POST['LetterSound'][0]}/{$_POST['LetterSound']}";

		var_dump($_FILES, $_POST, $path);

		exit;

	}

	public function testSoundex(){

		$nameCodes = array(
			"Trevor"	=>	soundex("trevor"),
			"Thomas"	=>	soundex("thomas"),
			"Steve"	=>	soundex("steve"),
			"Sarah"	=>	soundex("sarah"),
			"Gino"	=>	soundex("gino"),
			"George"	=>	soundex("george"),
			"Mike"	=>	soundex("mike"),
			"Malory"	=>	soundex("malory"),
			"Jose"	=>	soundex("jose"),
			"John"	=>	soundex("john"),
			"Jenny" => soundex("jenny"),
			"Juanita" => soundex("juanita"),
			"Guy"	=> soundex("guy")
		);

		$objectCodes = array(
			"trap"	=>	soundex("trap"),
			"train"	=>	soundex("train"),
			"top"	=>	soundex("top"),
			"star"	=>	soundex("star"),
			"jeans"	=>	soundex("jeans"),
			"Mittens"	=>	soundex("mittens"),
			"Major"	=>	soundex("major"),
			"hose"	=>	soundex("hose"),
			"Giant"	=>	soundex("giant"),
			"Wand"	=>	soundex("wand")
		);

		var_dump($nameCodes, $objectCodes);




		exit;
	}

	/////////////////////////////	Class Managment	/////////////////////////////////////////////////////////////
	
	public function getClassList($teacherId){

		$cMgr = new ClassManager($teacherId);
		$classList = $cMgr->getClassList();

		$tpl = new Template("class-list");
		$tpl->addPath(__DIR__ . "/templates");

		return $tpl->render(array("classList" => $classList));
	}

	public function getStudentList($classId){

		$studentGroup = new StudentGroupManager($classId);
		$students = $studentGroup->getStudentList();

		$tpl = new Template("student-list");
		$tpl->addPath(__DIR__ . "/templates");

		return $tpl->render(array("students" => $students));
	}

	public function updateStudent($studentId){

		$student = new Student("Joey Johnson");
		$student->setLetterLinkImageUrl(PictureManager::getImage($letterSound));

		$tpl = new Template("student-form");
		$tpl->addPath(__DIR__ . "/templates");

		return $tpl->render(array("student" => $student));
	}
}