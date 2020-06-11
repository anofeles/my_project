<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class SignalDetecTestPasuxuser extends Model
{
    protected $table = 'signal_detec_test_pasuxuser';
    protected $fillable = [
        'sworpasux','saertoraod','ganlageba','ganlraod','momxpasux','pasxdro','upasuxatuara','testissworpas','xgerdzi','ygerdzi','testuuid','datauser'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
