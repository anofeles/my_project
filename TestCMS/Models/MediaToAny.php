<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class MediaToAny extends Model
{
    protected $table = 'media_to_any';
    public $timestamps = false;
    protected $fillable = [
        'media_uuid','row_uuid','type','is_main'
    ];
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
