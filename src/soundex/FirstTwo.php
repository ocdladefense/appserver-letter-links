<?php

class FirstTwo {

    public static function getImage($letterSound){
        
        $basePath = ".." . module_path() . "/content/prototypeImages";

        // var_dump($basePath);exit;

        $filenames = scandir($basePath);

        // If the first two letters of the image name matcht the lettersound, return the url to the image.
        foreach($filenames as $name){

            $fileLetterSound = strtolower(substr($name, 0, 2));

            if($fileLetterSound == $letterSound){

                return substr($basePath, 2) . "/$name";
            }
        }

        // If no letterlinks are found for a lettersound, just match based on the first letter.  Maybe not though.
        foreach($filenames as $name){
    
            if($name[0] == $letterSound[0]){

                return substr($basePath, 2) . "/$name";
            }
        }
    }

}