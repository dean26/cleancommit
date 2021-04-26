<?php

namespace App\Helpers;

class Helper{

    public static function createSlug($str, $replace = array(), $delimiter = '-')
    {
    
        if (!empty($replace)) {
            $str = str_replace((array)$replace, ' ', $str);
        }
    
        $str = str_replace(
            array('ś', 'ć', 'ą', 'ę', 'ł', 'ó', 'ń', 'ż', 'ź', 'Ś', 'Ć', 'Ą', 'Ę', 'Ł', 'Ó', 'Ń', 'Ż', 'Ź'),
            array('s', 'c', 'a', 'e', 'l', 'o', 'n', 'z', 'z', 'S', 'ć', 'ą', 'ę', 'l', 'ó', 'ń', 'z', 'z'),
            $str
        );
    
        $str = str_replace(
            array('!', ')', '(', '?', ',', '.', ':', ';', '\'', '"', '>', '<', '|', '&', '^', '%', '$', '#', '@', '+'),
            array(''),
            $str
        );
    
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
    
        return $clean;
    
    }

}
