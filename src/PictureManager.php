<?php

class PictureManager {

    public static function getPictures($lang = null, $letter = null, $sound = null){

        $images = array(
            "Acrobat" => "/modules/letter-links/content/images/{$lang}/{$letter}/{$sound}/acrobat.jpg",
            "Alligator" => "/modules/letter-links/content/images/{$lang}/{$letter}/{$sound}/alligator.jpg",
            "Anchovy" => "/modules/letter-links/content/images/{$lang}/{$letter}/{$sound}/anchovy.jpg",
            "Ant" => "/modules/letter-links/content/images/{$lang}/{$letter}/{$sound}/ant2.jpg",
            "Anteater" => "/modules/letter-links/content/images/{$lang}/{$letter}/{$sound}/anteater.jpg"
        );

        return $images;
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