<?php

// use Salesforce\Database as Database;

class LetterLinksModule extends Module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function test()
	{
        $t = new Translate(__DIR__ . '/src/lang',array("en.txt","es.txt"));
        //$t->get('menu_faq','en');//->faqs
        $tpl = new TestTemplate("letter-links");
		$tpl->addPath(__DIR__ . "/templates");
        return $tpl->render(array(
		"t" => $t
		));
    }
}

?>