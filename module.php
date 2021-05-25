<?php

use Http\HttpResponse;
use Http\HttpHeader;

// use Salesforce\Database as Database;
use function LetterLinks\current_user;
use Salesforce\OAuth as OAuth;




class LetterLinksModule extends Module
{


	public function __construct()
	{
		parent::__construct();
	}
	
	
	
	public function section($section) {


$links = array(
	"daily-routine" => array(
		"title" => "Daily Routine",
		"links" => array(
			"Plan-Do-Review",
			"Group Times",
			"Transitions",
			"Mealtimes",
			"Outside Time"
		)
	),
	"" => array(
	
	)
);

		// print_r($links);exit;
		$tpl = new Template("wheel-section");
		$tpl->addPath(__DIR__ . "/templates");


		$info = $links[$section];
		
		$title = $info["title"];
		$links = $info["links"];
  
		return $tpl->render( array(
			"section" => $section,
			"title" => $title,
			"links" => $links
		));
	}
	
	public function showApp() {

		$tpl = new Template("wheel");
		$tpl->addPath(__DIR__ . "/templates");


		return $tpl;
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

	public function user(){
		$user = current_user();
		var_dump( $user);
		exit;
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

	public function logout(){
		$connectedApp = "letter-links";
		$flow = "webserver";
		$logout = Oauth::logout($connectedApp, $flow,true);
		if(!$logout) {
			echo("error");
			exit;
		}
		
		header('Location: /letterlinks/content/about', true, 302);
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

		//$api = $this->loadForceApi();

		// Will be ordering by Day__c or something other than name.  Create the field on the class.
		$query = "SELECT Id, Name, LetterLinkImageURL__c, Teacher__r.Name, Teacher__c FROM Class__c WHERE Teacher__c = '$teacherId' ORDER BY Name";
		
		$results = $this->execute($query, "query");

		$classList = array();
		foreach($results->getRecords() as $class){

			$classList[] = StudentGroup::fromQueryResultRecord($class);  
		}

		$teacher = $this->getTeacher($teacherId);

		$tpl = new Template("class-list");
		$tpl->addPath(__DIR__ . "/templates");

		return $tpl->render(array("classList" => $classList, "teacher" => $teacher));
	}

	public function addClass(){

		$req = $this->getRequest();
		$formData = $req->getBody();
		$teacherId = "0030400000CVEHhAAP";//getting from form/session later?

		$api = $this->loadForceApi();
		$sobject = array(
			'Teacher__c' => $teacherId,
			"LetterLinkImageURL__c" => module_path()."/content/prototypeImages/dog.jpg",//$formData->LetterLinkImageURL__c,
			"Name" => $formData->Name
		 );
		$resp = $api->upsert("Class__c",$sobject);
		
		if(!$resp->success()) throw new Exception($resp->getErrorMessage());

		$resp = new HttpResponse();
		$resp->addHeader(new HttpHeader("Location", "/my-account"));

		return $resp;
	}
	

	public function getTeacher($teacherId){

		$query = "SELECT Id, FirstName, LastName, LetterLinkImageURL__c FROM Contact WHERE Id = '$teacherId'";

		$results = $this->execute($query, "query");

		return Teacher::fromQueryResultRecord($results->getRecord(0));
	}
	
	

	//////////////////////////////	Student Managment	/////////////////////////////////////////////////

	// Shows the page with the list of students for a given class Id.
	public function showStudentList($classId){

		$query = "SELECT Id, Name, Teacher__c FROM Class__c WHERE Id = '$classId'";

		$resp = $this->execute($query, "query");

		$class = StudentGroup::fromQueryResultRecord($resp->getRecord());

		$students = $this->getStudents($class->getId());

		$tpl = new Template("student-list");
		$tpl->addPath(__DIR__ . "/templates");

		return $tpl->render(array("class" => $class, "students" => $students));
	}

	// Returns a list of "Student" objects for a given class id.
	public function getStudents($classId) {

		$query = "SELECT Id, Name, Age__c, Class__c, Language__c, LetterLinkImageUrl__c FROM Student__c WHERE Class__c = '$classId'";

		$resp = $this->execute($query, "query");

		$students = array();
		foreach($resp->getRecords() as $stud) {

			$student =  Student::fromQueryResultRecord($stud);
			$letterSound = $student->getLetterSound();
            if($student->getLetterLinkImageUrl() == null) $student->setLetterLinkImageUrl(PictureManager::getImage($letterSound));
			$students[] = $student;
		}

		return $students;
	}

	// Shows the stand alone student page for a student at a given "Student__c" id.
	public function showStudent($studentId){

		$student = $this->getStudent($studentId);

		$tpl = new Template("student-form");
		$tpl->addPath(__DIR__ . "/templates");

		return $tpl->render(array("student" => $student));
	}


	// Returns a "Student" php object.
	public function getStudent($id){

		$query = "SELECT Id, Class__c, Name, Age__c, Language__c, LetterLinkImageUrl__c FROM Student__c WHERE Id = '$id'";

		$resp = $this->execute($query, "query");

		$student = Student::fromQueryResultRecord($resp->getRecord());
		$letterSound = $student->getLetterSound();
		if($student->getLetterLinkImageUrl() == null) $student->setLetterLinkImageUrl(PictureManager::getImage($letterSound));

		return $student;
	}

	public function updateStudent(){
		
		$req = $this->getRequest();
		$files = $req->getFiles();

		$student = $req->getBody();
		$studentId = $student->Id;
		unset($student->default);  // Not a field on the student in salesforce.

		if($files->size() > 0){

			$pathToImage = "/content/uploads/" . $files->getFirst()->getName(); // Use the path_to_uploads() 
			$student->LetterLinkImageURL__c = $pathToImage;
		}

		$api = $this->loadForceApi();
		$resp = $api->upsert("Student__c", $student);

		if(!$resp->success()) throw new Exception($resp->getErrorMessage());

		$resp = new HttpResponse();
		$resp->addHeader(new HttpHeader("Location", "/student/{$studentId}"));

		return $resp;
	}

	public function addStudent() {

		$req = $this->getRequest();
		$student = $req->getBody();

		$api = $this->loadForceApi();
		
		$resp = $api->upsert("Student__c", $student);

		if(!$resp->success()) throw new Exception($resp->getErrorMessage());

		$resp = new HttpResponse();
		$resp->addHeader(new HttpHeader("Location", "/classes/$student->Class__c/students"));

		return $resp;
	}

	public function deleteStudent($studentId){

		$api = $this->loadForceApi();

		$student = $this->getStudent($studentId);  // Need to get the student object for the redirect back to the class list.

		$resp = $api->delete("Student__c", $studentId);

		if(!$resp->success()) throw new Exception($resp->getErrorMessage());

		$resp = new HttpResponse();
		$resp->addHeader(new HttpHeader("Location", "/classes/{$student->getClass__c()}/students"));

		return $resp;
	}
}