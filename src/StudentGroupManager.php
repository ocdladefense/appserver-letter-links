<?php

class StudentGroupManager {

    public $studentGroupId;

    public function __construct($studentGroupId){

        $this->studentGroupId = $studentGroupId;
    }

    public function getStudentList(){

        $students = array(
            new Student("Joey Johnson"),
            new Student("Timmy Dalton"),
            new Student("Debbie Sue"),
            new Student("Curly Sue"),
            new Student("Suzie Que"),
            new Student("Hoodie Hoo"),
            new Student("Micheal Jordan"),
            new Student("Steve Smith"),
            new Student("John Goodman"),
            new Student("Danny Glover")
        );

        foreach($students as $student){

            $letterSound = $student->getLetterSound();
            $student->setLetterLinkImageUrl(PictureManager::getImage($letterSound));
        }

        return $students;   // tojson
    }
}