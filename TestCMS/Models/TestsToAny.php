<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class TestsToAny extends Model
{
    protected $table = 'tests_to_any';
    public $timestamps = false;
    protected $fillable = [
        'test_uuid', 'row_uuid', 'type'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
