<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class ReaqciYuradgTestDiagram extends Model
{
    protected $table = 'reaqci_yuradg_test_diagram';

    protected $fillable = [
        'uuid', 'testuuid', 'diagrama_x', 'diagrama_y', 'user_uuid','date'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
