<?php


namespace TestCMS\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use Translatable;
    protected $table = 'translation';
    protected $fillable = [
        'key'
    ];
    public $translatedAttributes = [
        'value','locale'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
