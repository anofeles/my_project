<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class MenuToAnys extends Model
{
    protected $table = 'menu_to_anys';
    public $timestamps = false;
    protected $fillable = [
        'menu_uuid','row_uuid','type'
    ];
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
