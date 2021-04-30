<?php

class TestTemplate extends Template {

		// Component styles.
		private $css = array(
			array(
				"active" => true,
				"href" => __DIR__.DIRECTORY_SEPARATOR."css".DIRECTORY_SEPARATOR."default.css"
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
				$scripts [] = array("src" => __DIR__.DIRECTORY_SEPARATOR."js".DIRECTORY_SEPARATOR.$name);			
			}
			
			
			$this->addScripts($scripts);
		}
}