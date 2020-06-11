<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class CnobistestTestTranslations extends Model
{
    protected $table = 'cnobistest_test_translations';
    public $timestamps = false;
    protected $fillable = [
        'title','desc','locale','defic'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
