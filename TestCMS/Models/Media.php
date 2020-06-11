<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Media extends Model
{

    protected $table = 'media';
    protected $fillable = [
        'uuid', 'media'
    ];


    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
