<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class PerceftCompareTestToAny extends Model
{
    protected $table = 'perceft_compare_test_to_any';
    public $timestamps = false;
    protected $fillable = [
        'uuid','perceft_compare_test_uuid','row_uuid','type'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
