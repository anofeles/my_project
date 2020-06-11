<?php


namespace TestCMS\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Tests extends Model
{
    use Translatable;
    protected $table = 'tests';
    protected $fillable = [
        'uuid', 'key'
    ];
    public $translatedAttributes = [
        'value','local'
    ];
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
