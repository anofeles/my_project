<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    protected $table = 'menu_translations';
    protected $fillable = [
        'name','locale','menu_id'
    ];
    public $timestamps = false;
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
