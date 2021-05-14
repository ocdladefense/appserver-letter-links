<?php

// Actually represents a class of students.
class StudentGroup extends Salesforce\SObject {

    private $TeacherId;

    private $LetterLinkImageUrl;

    public function __construct(){}

    public static function fromQueryResultRecord($studentGroup){

        $sg = new self();

        $sg->Name = $studentGroup["Name"];
        $sg->TeacherId = $studentGroup["Teacher__c"];
        $sg->Id = $studentGroup["Id"];
        $sg->LetterLinkImageUrl = $studentGroup["LetterLinkImageURL__c"];

        return $sg;
    }

    public function getTeacherId(){

        return $this->TeacherId;
    }

    public function getLetterLinkImageUrl(){

        return $this->LetterLinkImageUrl;
    }

    public function getLetterLinkCaption(){

        $urlParts = explode("/", $this->LetterLinkImageUrl);

        $caption = $urlParts[count($urlParts) -1];

        return $caption;
    }


}