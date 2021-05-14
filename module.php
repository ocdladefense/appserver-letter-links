<?php

use Http\HttpResponse;
use Http\HttpHeader;

// use Salesforce\Database as Database;

class LetterLinksModule extends Module
{


	public function __construct()
	{
		parent::__construct();
	}

	public function showPage($page){
		$loadFromFile = true;
		$language = getDefaultLanguage(); // Should not be here; t() should figure this out.
		$content = t($page,$language,$loadFromFile);



		$tpl = new Template("page");

		$tpl->addPath(__DIR__ . "/templates");


		
		return $tpl->render( array(
			"content" => $content
		));
	}
	
	
	public function showHome($page = "about"){
		return $this->showPage($page);
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

	/////////////////////////////	Class Managment	/////////////////////////////////////////////////////////////
	public function testAccount(){
		return $this->getClassList('0030400000CVEHhAAP');
	}
	
	public function getMyAccount($teacherId){
		return $this->getClassList($teacherId);
	}

	public function getClassList($teacherId){

		$api = $this->loadForceApi();

		// Will be ordering by Day__c or something other than name.  Create the field on the class.
		$query = "SELECT Id, Name, LetterLinkImageURL__c, Teacher__r.Name, Teacher__c FROM Class__c WHERE Teacher__c = '$teacherId' ORDER BY Name";
		
		$results = $api->query($query);

		$classList = array();
		foreach($results->getRecords() as $class){

			$classList[] = StudentGroup::fromQueryResultRecord($class);  
		}

		$teacher = $this->getTeacher($teacherId);

		$tpl = new Template("class-list");
		$tpl->addPath(__DIR__ . "/templates");

		return $tpl->render(array("classList" => $classList, "teacher" => $teacher));
	}

	public function getTeacher($teacherId){

		$api = $this->loadForceApi();

		$query = "SELECT Id, FirstName, LastName, LetterLinkImageURL__c FROM Contact WHERE Id = '$teacherId'";

		$results = $api->query($query);

		return Teacher::fromQueryResultRecord($results->getRecord(0));
	}
	
	

	//////////////////////////////	Student Managment	/////////////////////////////////////////////////


	public function getStudentList($classId){

		$studentGroup = new StudentGroupManager($classId);
		$students = $studentGroup->getStudentList();

		$tpl = new Template("student-list");
		$tpl->addPath(__DIR__ . "/templates");

		return $tpl->render(array("students" => $students));
	}


	public function getStudent($id){


		$student = new Student("Joey Johnson");
		$student->setLetterLinkImageUrl(PictureManager::getImage($student->getLetterSound()));

		$tpl = new Template("student-form");
		$tpl->addPath(__DIR__ . "/templates");

		return $tpl->render(array("student" => $student));
	}


	public function updateStudent(){
		
		$req = $this->getRequest();
		$formData = $req->getBody();
		$studentId = $formData->recordId;

		$files = $req->getFiles();

		var_dump($files);exit;

		$student = new Student($formData->name);
		$student->setLetterLinkCaption($formData->caption);
		$student->setLetterLinkImageUrl($formData->letterLinkUrl);

		if($files->size() > 0){

			$pathToImage = "/content/uploads/" . $files->getFirst()->getName(); // Use the path_to_uploads() 
			$student->setLetterLinkImageUrl($pathToImage);
		}

		$resp = new HttpResponse();
		$resp->addHeader(new HttpHeader("Location", "/student/{$studentId}"));

		return $resp;
	}
}