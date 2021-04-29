<?php

class ClassManager {

    private $teacherId;

    // This class allows a teacher to manage all of their classes.
    public function __construct($teacherId){

        $this->teacherId = $teacherId;
    }

    // Return a list of the teachers classes.
    public function getClassList(){

        $classes = array(
            array(
                "name"  => "Daily Morning Class 1",
                "image" => "/modules/letter-links/content/images/en/D/D-Dewan/daisy.jpg",
                "imageName" => "Daisy"
            ),
            array(
                "name"  => "Daily Morning Class 2",
                "image" => "/modules/letter-links/content/images/en/D/D-Dewan/dalmatian.jpg",
                "imageName" => "Dalmatian"
            ),
            array(
                "name"  => "Daily Afternoon Class 1",
                "image" => "/modules/letter-links/content/images/en/D/D-Dewan/dinosaur.jpg",
                "imageName" => "Dinosaur"
            ),
            array(
                "name"  => "Daily Afternoon Class 2",
                "image" => "/modules/letter-links/content/images/en/D/D-Dewan/dog2.jpg",
                "imageName" => "Dog"
            ),
            array(
                "name"  => "Daily Evening Class 1",
                "image" => "/modules/letter-links/content/images/en/D/D-Dewan/dolphin.jpg",
                "imageName" => "Dolphin"
            ),
            array(
                "name"  => "Daily Evening Class 2",
                "image" => "/modules/letter-links/content/images/en/D/D-Dewan/donut.jpg",
                "imageName" => "Donut"
            )
        );
        
        return $classes;
    }
}