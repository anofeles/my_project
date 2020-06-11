<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class SignalDetecTestPasux extends Model
{
    protected $table = 'signal_detec_test_pasux';
    protected $fillable = [
        'uuid','sworpasux','saertoraod','ganlageba','ganlraod','momxpasux','pasxdro','upasuxatuara','testissworpas','xgerdzi','ygerdzi','testuuid'
    ];

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
