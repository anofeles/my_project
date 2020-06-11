<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class LewsgadTestToAny extends Model
{
    protected $table = 'lewsgad_test_to_any';
    public $timestamps = false;
    protected $fillable = [
        'uuid','lewsgad_test','row_uuid','type'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
