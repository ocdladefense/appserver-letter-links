<?php

class ClassManager {

    private $teacherId;

    // This class allows a teacher to manage all of their classes.
    public function __construct($teacherId){

        $this->teacherId = $teacherId;
    }

    // Return a list of the teachers classes.
    public function getClassList(){}

    // Return the class at the given "classId".
    public function getClass($classId){}

    // Add a class to the teachers list of classes.
    public function addClass($obj){}

    // Delete a class from the teachers list of classes.
    public function deleteClass($classId){}


}