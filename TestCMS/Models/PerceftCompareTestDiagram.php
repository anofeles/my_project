<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class PerceftCompareTestDiagram  extends Model
{
    protected $table = 'perceft_compare_test_diagram';

    protected $fillable = [
        'uuid','testuuid','diagrama_x','diagrama_y','user_uuid','date'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
