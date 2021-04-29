<?php

class StudentGroupManager {

    public $studentGroupId;

    public function __construct($studentGroupId){

        $this->studentGroupId = $studentGroupId;
    }

    public function getStudentList(){

        $students = array(
            array(
                "name" => "Joey Johnson",
                "image"=> "a54s687x4894189"
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

        $student = new Student("Joey Johnson");
        $letterSound = $student->getLetterSound();
        $image = PictureManager::getImage($letterSound);

        return array(
            array(
                "name" => $student->getName(),

                "image" => $image
            )
        );


    }
}