<?php

class PictureManager {

    public static function getPictures($lang = null, $letter = null, $sound = null){
        
        $basePath = "/modules/letter-links/content/images/{$lang}/{$letter}/{$sound}";

        $images = array(
            "Acrobat" => "{$basePath}/acrobat.jpg",
            "Alligator" => "{$basePath}/alligator.jpg",
            "Anchovy" => "{$basePath}/anchovy.jpg",
            "Ant" => "{$basePath}/ant2.jpg",
            "Anteater" => "{$basePath}/anteater.jpg"
        );

        if($letter == "D"){

            //var_dump($basePath);exit;

            $images = array(
                "Daisy" => "{$basePath}/daisy.jpg",
                "Dalmatian" => "{$basePath}/dalmatian.jpg",
                "Dinosaur" => "{$basePath}/dinosaur.jpg",
                "Dog2" => "{$basePath}/dog2.jpg",
                "Dolphin" => "{$basePath}/dolphin.jpg",
                "Donut" => "{$basePath}/donut.jpg",
                "Door" => "{$basePath}/door.jpg",
                "Door2" => "{$basePath}/door2.jpg",
                "Duck" => "{$basePath}/Duck.jpg",
                "Duck2" => "{$basePath}/duck2.jpg",
                "Dumptruck" => "{$basePath}/dumptruck1.jpg",
                "Diamond" => "{$basePath}/shape.jpg"
            );

        }
        return $images;
    }

    // Returns the correct image for the letter sound.
    // Figure out how to incorprate the language and letter.
    // Will be getting the id of the image and pass that / use it to get he image url.
    // This funtion can support multiple agorithims for finding the letter link.
    public static function getImage($params){
        
        $imageAlgorithim = "FirstTwo";
        $image = $imageAlgorithim::getPictures($params);
        
    }

    public static function getPictures2($dir){

        if(!file_exists($dir)) throw new Exception("PICTURE_REQUEST_ERROR: No pictures saved for given letter sound.");

        // Scan the directory for image files removing the "parent", and "current" directories from the results.
        $images = array_diff(scandir($dir), array(".", ".."));

        // Loop through the image files and add the paths to an array with the keys being user friendly names.
        $imageInfo = array();
        $index = 2;
        foreach($images as $image){

            $imageName = self::getUserFriendlyName($image);

            //  Increment the image name if the "imageInfo" array already has a value at that index.
            if($imageInfo[$imageName] != null){

                $imageName = $imageName . " " . $index;  // Keeping the image name user friendly.
                $index++;
            }

            $imageInfo[$imageName] = "/$image";
        }

        return $imageInfo;
    }

    public static function getUserFriendlyName($image){

        $imageName = preg_replace("/[0-9,_]+/", "", $image);

        return ucwords(explode(".", $imageName)[0]);
    }

    public static function uploadPictures($dir) {

        var_dump($dir);

        exit;

    }
}
?>