<?php 

namespace App\Helpers;
use Illuminate\Database\Eloquent\Model;

class OldForm{

    static array $inputs;

    public static function getVal(string $field_name, Model $object): string
    {
        if(!isset(self::$inputs)) self::$inputs = session()->getOldInput();

        return (isset(self::$inputs[$field_name])) ? self::$inputs[$field_name] : (string)$object->$field_name;
    }

}

