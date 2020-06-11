<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class InfgadprocTestPasuxuser extends Model
{
    protected $table = 'infgadproc_test_pasuxuser';
    protected $fillable = [
        'testaso', 'gradusi', 'revers', 'momxpasux', 'pasuxdro', 'upasuxtuara', 'sworipasux', 'dattestuuidauser', 'datauser','user_uuid','testuuid'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
