<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;


class TranslationTranslation extends Model
{
    protected $table = 'translation_translations';
    public $timestamps = false;
    protected $fillable = [
        'value','locale'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
