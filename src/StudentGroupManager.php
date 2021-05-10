<?php

class StudentGroupManager {

    public $studentGroupId;

    public function __construct($studentGroupId){

        $this->studentGroupId = $studentGroupId;
    }

    public function getStudentList(){

        $students = array(
            new Student("Joey Johnson",1),
            new Student("Timmy Dalton",2),
            new Student("Debbie Sue",3),
            new Student("Curly Sue",4),
            new Student("Suzie Que",5),
            new Student("Hoodie Hoo",6),
            new Student("Micheal Jordan",7),
            new Student("Steve Smith",8),
            new Student("John Goodman",9),
            new Student("Danny Glover",10)
        );

        foreach($students as $student){

            $letterSound = $student->getLetterSound();
            $student->setLetterLinkImageUrl(PictureManager::getImage($letterSound));
        }

        return $students;   // tojson
    }
}