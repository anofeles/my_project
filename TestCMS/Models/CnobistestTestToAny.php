<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class CnobistestTestToAny extends Model
{
    protected $table = 'cnobistest_test_to_any';
    public $timestamps = false;
    protected $fillable = [
        'uuid','cnobistest_test','row_uuid','type'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
