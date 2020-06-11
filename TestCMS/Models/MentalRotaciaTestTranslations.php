<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class MentalRotaciaTestTranslations extends Model
{
    protected $table = 'mental_rotacia_test_translations';
    public $timestamps = false;
    protected $fillable = [
        'title','desc','locale','defic'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
