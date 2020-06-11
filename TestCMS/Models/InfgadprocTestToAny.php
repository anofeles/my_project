<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class InfgadprocTestToAny extends Model
{
    protected $table = 'infgadproc_test_to_any';
    public $timestamps = false;
    protected $fillable = [
        'uuid','infgadproc_test','row_uuid','type'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
