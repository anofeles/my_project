<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class SelectionTestToAny extends Model
{
    protected $table = 'selection_test_to_any';
    public $timestamps = false;
    protected $fillable = [
      'uuid','selection_test_uuid','row_uuid','type','empti'
    ];
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
