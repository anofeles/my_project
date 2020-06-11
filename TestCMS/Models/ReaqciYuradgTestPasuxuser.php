<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ReaqciYuradgTestPasuxuser extends Model
{
    protected $table = 'reaqci_yuradg_test_pasuxuser';
    protected $fillable = [
        'pirveliaso', 'pirvelgilak', 'meoreaso', 'meoregilak', 'mesameaso', 'mesamegilak', 'meotxeaso', 'meotxegilak', 'momxpasux', 'pasuxdro', 'upasuxtuara', 'sworipasux','testuuid','datauser','user_uuid','altraod','type','stimul'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }

}
