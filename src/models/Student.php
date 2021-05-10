<?php

class Student {

    private $name;

    private $id = "stud6+568778456";

    private $language = "english";

    private $letterLinkImageId = "img152h448448d115";

    private $letterLinkImageUrl;

    private $letterLinkCaption;

    public function __construct($name, $id = null){

        $this->name = $name;
        $this->id = !empty($id) ? $id : "stud6+568778456";
    }

    public function setId($studentId){

        $this->id = $studentId;
    }
    
    public function setLanguage($language){
        $this->language = $language;
    }


    public function getLanguage(){
        return $this->language;
    }

    public function setLetterLinkImageId($id){

        $this->letterLinkImageId = $id;
    }

    public function setLetterLinkImageUrl($url){

        $this->letterLinkImageUrl = $url;
    }

    public function setLetterLinkCaption($caption){

        $this->letterLinkCaption = $caption;
    }

    public function getName(){

        return $this->name;
    }

    public function getId(){

        return $this->id;
    }

    // soundex  
    public function getLetterSound($algo = "FirstTwo"){

        return strtolower(substr($this->name, 0, 2));
    }

    public function getLetterLinkImageId(){

        return $this->letterLinkImageId;
    }

    public function getLetterLinkImageUrl(){

        return $this->letterLinkImageUrl;
    }

    public function getLetterLinkCaption(){

        $urlParts = explode("/", $this->letterLinkImageUrl);

        $caption = $urlParts[count($urlParts) -1];

        return $caption;
    }

    public function __toJson(){

        $student = array(
            "name"      => $this->name,
            "id"        => $this->id,
            "letterLinkId" => $this->letterLinkId,
            "letterLinkImageUrl"    => $this->letterLinkImageUrl
        );

        return $student;
    }
}