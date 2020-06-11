<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class StrupEfeqtTestDiagram extends Model
{
    protected $table = 'strup_efeqt_test_diagram';
    protected $fillable = [
        'uuid', 'testuuid', 'diagrama_x', 'diagrama_y', 'user_uuid','date'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
