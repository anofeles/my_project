<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class ReaqciYuradgTestTranslations extends Model
{
    protected $table = 'reaqci_yuradg_test_translations';
    public $timestamps = false;
    protected $fillable = [
        'title','desc','locale','defic'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
