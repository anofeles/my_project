<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class LewsgadTestDiagram extends Model
{
    protected $table = 'lewsgad_test_diagram';
    protected $fillable = [
        'uuid','testuuid','diagrama_x','diagrama_y','user_uuid','date'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
