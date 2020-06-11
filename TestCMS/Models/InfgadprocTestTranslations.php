<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class InfgadprocTestTranslations extends Model
{
    protected $table = 'infgadproc_test_translations';
    public $timestamps = false;
    protected $fillable = [
        'title','desc','locale','defic'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
