<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ReaqciYuradgTestParts extends Model
{

    protected $table = 'reaqci_yuradg_test_parts';

    protected $fillable = [
        'uuid','pirveliaso','pirvelgilak','meoreiaso','meoregilak','mesameaso','mesamegilak','meotxeaso','meotxegilak','altraod'
    ];
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
