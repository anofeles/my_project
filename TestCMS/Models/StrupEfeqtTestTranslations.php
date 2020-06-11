<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class StrupEfeqtTestTranslations extends Model
{
    protected $table = 'strup_efeqt_test_translations';
    public $timestamps = false;
    protected $fillable = [
        'title','desc','locale','defic'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }

}
