<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class InfgadprocTestDiagram extends Model
{
    protected $table = 'infgadproc_test_diagram';
    protected $fillable = [
        'uuid','testuuid','diagrama_x','diagrama_y','user_uuid','date'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
