<?php

class Teacher extends Salesforce\SObject {

    private $LetterLinkImageUrl;

    public function __construct(){}

    public static function fromQueryResultRecord($teach){

        $teacher = new self();

        $teacher->Id = $teach["Id"];
        $teacher->Name = $teach["FirstName"];
        $teacher->LetterLinkImageUrl = $teach["LetterLinkImageUrl__c"];

        return $teacher;
    }

    public function getLetterLinkImageUrl(){

        return $this->LetterLinkImageUrl;
    }


}