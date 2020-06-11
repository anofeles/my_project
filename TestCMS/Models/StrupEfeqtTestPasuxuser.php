<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class StrupEfeqtTestPasuxuser extends Model
{
    protected $table = 'strup_efeqt_test_pasuxuser';
    protected $fillable = [
        'color','text','kebord','momxpasux','pasuxdro','upasuxtuara','sworipasux','testuuid','datauser','user_uuid','kofiguration'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
