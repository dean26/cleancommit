<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name', 'email', 'website'];
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'logo'];
      
    /**
     * __toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
    
    /**
     * employees
     *
     * @return void
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    
    /**
     * formList
     *
     * @return void
     */
    public static function formList()
    {
        $array = [];
        $list = self::select("id", "name")->orderBy("name")->get();
        foreach($list as $record){
            $array[$record->id] = $record->name;
        }
        return $array;
    }
    
    /**
     * getStoragePath
     *
     * @return void
     */
    public function getStoragePath()
    {
        return 'public/'.$this->id;
    }
     
    
    /**
     * getPublicPath
     *
     * @return void
     */
    public function getPublicPath()
    {
        return 'storage/'.$this->id;
    }
    
    /**
     * getFullPublicPath
     *
     * @return void
     */
    public function getFullPublicPath()
    {
        return $this->getPublicPath().'/'.$this->logo;
    }
    
    /**
     * getFullStoragePath
     *
     * @return void
     */
    public function getFullStoragePath()
    {
        return $this->getStoragePath().'/'.$this->logo;
    }
}
