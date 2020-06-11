<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class ReaqciYuradgTestToAny extends Model
{
    protected $table = 'reaqci_yuradg_test_to_any';
    public $timestamps = false;
    protected $fillable = [
        'uuid','reaqci_yuradg_test_uuid','row_uuid','type'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
