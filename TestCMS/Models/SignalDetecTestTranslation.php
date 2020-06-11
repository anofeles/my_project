<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class SignalDetecTestTranslation extends Model
{
    protected $table = 'signal_detec_test_translations';
    public $timestamps = false;
    protected $fillable = [
        'title','desc','locale','defic'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
