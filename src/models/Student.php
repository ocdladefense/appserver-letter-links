<?php

class Student {

    private $Id;

    private $FirstName;

    private $LastName;

    private $Age;

    private $Language;

    private $LetterLinkImageUrl;

    private $LetterLinkCaption;

    public function __construct() {}

    public static function fromQueryResultRecord($student){

        $st = new self();

        $st->Id = $student["Id"];
        $st->Name = $student["Name"];
        $st->FirstName = $student["FirstName__c"];
        $st->LastName = $student["LastName__c"];
        $st->Language = $student["Language__c"] != null ? $student["Language__c"] : "english";
        $st->LetterLinkImageUrl = $student["LetterLinkImageURL__c"];
        $st->LetterLinkCaption = $student["LetterLinkCaption__c"];
        $st->Age = $student["Age__c"];

        return $st;
    }

    // public static function fromRequestObj($obj){

    //     $st = new self();

    //     $st->Id = $obj->recordId;
    //     $st->Name = $student["FirstName__c"] . " " . $student["LastName__c"];
    //     $st->FirstName = $student["FirstName__c"];
    //     $st->LastName = $student["LastName__c"];
    //     $st->Language = $student["Language__c"] != null ? $student["Language__c"] : "english";
    //     $st->LetterLinkImageUrl = $student["LetterLinkImageURL__c"];
    //     $st->LetterLinkCaption = $student["LetterLinkCaption__c"];
    //     $st->Age = $student["Age__c"];

    //     return $st;

    //     var_dump($obj);exit;
    // }

    public function setId($studentId){

        $this->Id = $studentId;
    }

    public function getFirstName(){

        return $this->FirstName;
    }

    public function getLastName(){

        return $this->LastName;
    }
    
    public function getAge(){

        return $this->Age;
    }

    public function setLanguage($language){
        $this->Language = $language;
    }


    public function getLanguage(){
        return $this->Language;
    }

    public function setLetterLinkImageId($id){

        $this->LetterLinkImageId = $id;
    }

    public function setLetterLinkImageUrl($url){

        $this->LetterLinkImageUrl = $url;
        $this->LetterLinkCaption = $this->getLetterLinkCaption();
    }

    public function setLetterLinkCaption($caption){

        $this->LetterLinkCaption = $caption;
    }

    public function getName(){

        return $this->Name;
    }

    public function getId(){

        return $this->Id;
    }

    // soundex  
    public function getLetterSound($algo = "FirstTwo"){

        return strtolower(substr($this->FirstName, 0, 2));
    }

    public function getLetterLinkImageId(){

        return $this->LetterLinkImageId;
    }

    public function getLetterLinkImageUrl(){

        return $this->LetterLinkImageUrl;
    }

    public function getLetterLinkCaption(){

        $urlParts = explode("/", $this->LetterLinkImageUrl);

        $caption = $urlParts[count($urlParts) -1];

        return $caption;
    }


    // Needs Word!!! Not even close.  More like a note to self.
    public function __toJson(){

        $student = array(
            "Name"      => $this->Name,
            "Id"        => $this->Id,
            "LetterLinkImageUrl__c"    => $this->LetterLinkImageUrl,
            "FirstName__c"  => $this->FirstName,
            "LastName__c"   => $this->LastName
        );

        return json_encode($student);
    }
}