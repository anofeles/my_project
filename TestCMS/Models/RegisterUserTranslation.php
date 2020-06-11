<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class RegisterUserTranslation extends Model
{
    protected $table = 'register_user_translations';
    public $timestamps = false;
    protected $fillable = [
      'name','lname','email','locale'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
