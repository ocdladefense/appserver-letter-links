<?php

// use Salesforce\Database as Database;

class LetterLinksModule extends Module
{


	public function __construct()
	{
		parent::__construct();
	}

	public function es($route){
		switch ($route) {
			case 'faq':
				return $this->faq("es");
				break;
			case 'about':
				return $this->about("es");
				break;
			case 'help':
				return $this->help("es");
				break;
			case 'resources':
				return $this->resources("es");
				break;
			case 'activities':
				return $this->activities("es");
				break;
			default:
				$this->about("es");
				break;
		}
	}

	public function about($lang = null)
	{

		$t = new Translate(__DIR__ . '/src/lang',array("en.txt","es.txt"));
		//$t->get('menu_faq','en');//->faqs
		// $tpl = new TestTemplate("letter-links-en");
		
		
		$lang = $_GET["lang"] ?? "sp";
		
		$tpl = new TestTemplate("letter-links-".$lang);
		$tpl->addPath(__DIR__ . "/templates");
		
		
		
		return $tpl->render(array(
			"t" => $t
		));
	}
    
    
	public function test(){
		$t = new Translate(__DIR__ . '/src/lang',array("en.txt","es.txt"));

		$homeFiles = __DIR__ . '/src/about';
		$lang = $lang == "es" ? "-".$lang : "";
        $tpl = new Template("about".$lang);
		$tpl->addPath(__DIR__ . "/templates");
		//$tpl->addStyles($homeFiles."/styles");
		//$tpl->addScripts($homeFiles."/scripts");
        return $tpl->render(array(
			"files" => $homeFiles
		));
    }

	public function faq($lang = null)
	{
		$homeFiles = __DIR__ . '/src/faq';
		$lang = $lang == "es" ? "-".$lang : "";
        $tpl = new Template("faq".$lang);
		$tpl->addPath(__DIR__ . "/templates");
		//$tpl->addStyles($homeFiles."/styles");
		//$tpl->addScripts($homeFiles."/scripts");
        return $tpl->render(array(
			"files" => $homeFiles
		));
    }


	public function help($lang = null)
	{
		$homeFiles = __DIR__ . '/src/help';
		$lang = $lang == "es" ? "-".$lang : "";
        $tpl = new Template("help".$lang);
		$tpl->addPath(__DIR__ . "/templates");
		//$tpl->addStyles($homeFiles."/styles");
		//$tpl->addScripts($homeFiles."/scripts");
        return $tpl->render(array(
			"files" => $homeFiles
		));
    }
	public function resources($lang = null)
	{
		$homeFiles = __DIR__ . '/src/resources';
		$lang = $lang == "es" ? "-".$lang : "";
        $tpl = new Template("resources".$lang);
		$tpl->addPath(__DIR__ . "/templates");
		//$tpl->addStyles($homeFiles."/styles");
		//$tpl->addScripts($homeFiles."/scripts");
        return $tpl->render(array(
			"files" => $homeFiles
		));
    }
	public function activities($lang = null)
	{
		$homeFiles = __DIR__ . '/src/activities';
		$lang = $lang == "es" ? "-".$lang : "";
        $tpl = new Template("activities".$lang);
		$tpl->addPath(__DIR__ . "/templates");
		//$tpl->addStyles($homeFiles."/styles");
		//$tpl->addScripts($homeFiles."/scripts");
        return $tpl->render(array(
			"files" => $homeFiles
		));
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



	public function test2(){
        $t = new Translate(__DIR__ . '/src/about',array("en.txt","es.txt"));

		// $tpl = new TestTemplate("letter-links-en");
		$lang = $_GET["lang"] ?? "sp";
		
		$tpl = new TestTemplate("letter-links-".$lang);
		
		
		$tpl->addPath(__DIR__ . "/templates");
        return $tpl->render(array(
			"t" => $t
		));
	}

	public function getPictures($lang, $sound){

		$pictures = PictureManager::getPictures("en", "A", "Short%20A");

		
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
	
	
}