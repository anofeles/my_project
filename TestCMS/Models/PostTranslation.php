<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    protected $table = 'post_translations';
    public $timestamps = false;
    protected $fillable = [
        'meta_title','meta_description','og_title','og_description','title','description','slug','locale'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
