<?php

class StudentGroupManager {

    public $studentGroupId;

    public function __construct($studentGroupId){

        $this->studentGroupId = $studentGroupId;
    }

    public function getStudentList(){

        return array(
            array(
                "name" => "Joey Johnson",
                "image"=> "/modules/letter-links/content/images/en/D/D-Dewan/dalmatian.jpg"
            ),            array(
                "name" => "Timmy Dalton",
                "image"=> "/modules/letter-links/content/images/en/D/D-Dewan/dalmatian.jpg"
            ),            array(
                "name" => "Debby Sue",
                "image"=> "/modules/letter-links/content/images/en/D/D-Dewan/dalmatian.jpg"
            ),            array(
                "name" => "Curly Sue",
                "image"=> "/modules/letter-links/content/images/en/D/D-Dewan/dalmatian.jpg"
            ),            array(
                "name" => "Suzie Que",
                "image"=> "/modules/letter-links/content/images/en/D/D-Dewan/dalmatian.jpg"
            ),            array(
                "name" => "Hoody Hoo",
                "image"=> "/modules/letter-links/content/images/en/D/D-Dewan/dalmatian.jpg"
            ),            array(
                "name" => "Micheal Jordan",
                "image"=> "/modules/letter-links/content/images/en/D/D-Dewan/dalmatian.jpg"
            ),            array(
                "name" => "Steve Smith",
                "image"=> "/modules/letter-links/content/images/en/D/D-Dewan/dalmatian.jpg"
            ),            array(
                "name" => "John Goodman",
                "image"=> "/modules/letter-links/content/images/en/D/D-Dewan/dalmatian.jpg"
            ),            array(
                "name" => "Danny Glover",
                "image"=> "/modules/letter-links/content/images/en/D/D-Dewan/dalmatian.jpg"
            )
        );
    }
}