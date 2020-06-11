<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class PerceftCompareTestParts extends Model
{
    protected $table = 'perceft_compare_test_parts';
    protected $fillable = [
        'uuid','persbig','perssmol','persbigpass','seqtorei'
    ];
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
