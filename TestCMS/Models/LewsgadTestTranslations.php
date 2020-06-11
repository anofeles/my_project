<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class LewsgadTestTranslations extends Model
{
    protected $table = 'lewsgad_test_translations';
    public $timestamps = false;
    protected $fillable = [
        'title','desc','locale','defic'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
