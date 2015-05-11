<?php

namespace M7\EditorBundle\Entity;

class Serializer {

    private static $path = "./database/";

    public static function save($obj, $id) {

        $arr = serialize($obj);
        
        return file_put_contents(self::$path . $id, $arr);
    }

    public static function restore($id) {
        
        if  (file_exists ( self::$path . $id ) ){
            
            $xmlString = file_get_contents(self::$path . $id);
            
            return unserialize($xmlString);  
            
        }
        
        return -1;
    }
    
    public static function showIds(){
        
        return array_slice(scandir(self::$path),2);
        
    }
}