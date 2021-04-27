<?php

// use Salesforce\Database as Database;

class LetterLinksModule extends Module
{


	public function __construct()
	{
		parent::__construct();
	}

	public function home()
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

		// $tpl = new TestTemplate("letter-links-en");
		$lang = $_GET["lang"] ?? "sp";
		
		$tpl = new TestTemplate("letter-links-".$lang);
		
		
		$tpl->addPath(__DIR__ . "/templates");
        return $tpl->render(array(
		"t" => $t
		));
	}
	
	
}