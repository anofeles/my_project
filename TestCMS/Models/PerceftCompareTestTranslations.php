<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class PerceftCompareTestTranslations extends Model
{
    protected $table = 'perceft_compare_test_translations';
    public $timestamps = false;
    protected $fillable = [
        'title','desc','locale','defic'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
