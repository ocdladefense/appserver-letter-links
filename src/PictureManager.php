<?php

class PictureManager {

    public static function getPictures($dir){

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

            $imageInfo[$imageName] = $dir . "/$image";
        }

        return $imageInfo;
    }

    public static function getUserFriendlyName($image){

        $imageName = preg_replace("/[0-9,_]+/", "", $image);

        return ucwords(explode(".", $imageName)[0]);
    }
}
?>