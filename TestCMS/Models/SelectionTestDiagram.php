<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class SelectionTestDiagram extends Model
{
    protected $table = 'selection_test_diagram';
    protected $fillable = [
        'uuid', 'testuuid', 'diagrama_x', 'diagrama_y', 'user_uuid','date'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
