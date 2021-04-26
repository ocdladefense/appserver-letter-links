<?php

class Translate {

    public $data;

	public function __construct($path,$files)
	{

        if(!is_dir($path)){
            throw new Exception("Not a directory");
        }
        foreach ($files as $file) {
            $key = substr($file, 0, strpos($file, "."));
            $this->data[$key] = array();

            $output = fopen($path."/".$file, 'r');
            while (($line = fgets($output)) !== false) {
                $data = explode(",", trim($line),2);
                if (count($data) < 1) {
                    throw new Exception("Error Processing Request", 1);
                }
                $this->data[$key][$data[0]] = $data[1];
            }
    
        }

	}

    public function get($lang,$key){
        return $this->data[$lang][$key];
    }
}
?>