<?php

class TestTemplate extends Template {

		// Component styles.
		private $css = array(
			array(
				"active" => true,
				"href" => "/modules/appserver-letter-links/css/default.css"
			)
		);
		

		// Component scripts.
		private $core = array(
			"/content/libraries/component/BaseComponent.js"
		);


		private $module = array(
			"sidebar.js"
		);




		public function __construct($name) {
			parent::__construct($name);


			
			$this->addStyles($this->css);

			$scripts = array();
			
			foreach($this->core as $name) {
				$scripts [] = array("src" => $name);			
			}
			foreach($this->module as $name) {
				$scripts [] = array("src" => "/modules/appserver-letter-links/js/".$name);			
			}
			
			
			$this->addScripts($scripts);
		}
}