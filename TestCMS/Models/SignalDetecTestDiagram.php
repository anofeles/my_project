<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class SignalDetecTestDiagram extends Model
{
    protected $table = 'signal_detec_test_diagram';
    protected $fillable = [
        'uuid', 'testuuid', 'diagrama_x', 'diagrama_y', 'user_uuid','date'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
