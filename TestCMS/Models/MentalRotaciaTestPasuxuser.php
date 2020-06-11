<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class MentalRotaciaTestPasuxuser extends Model
{
    protected $table = 'mental_rotacia_test_pasuxuser';
    protected $fillable = [
        'testaso', 'gradusi', 'revers', 'momxpasux', 'pasuxdro', 'upasuxtuara', 'sworipasux', 'dattestuuidauser', 'datauser','user_uuid','testuuid'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
