<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;


class TestsTranslation extends Model
{
    protected $table = 'tests_translations';
    public $timestamps = false;
    protected $fillable = [
        'value', 'locale'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
