<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class MentalRotaciaTestToAny extends Model
{
    protected $table = 'mental_rotacia_test_to_any';
    public $timestamps = false;
    protected $fillable = [
        'uuid','mental_rotacia_test','row_uuid','type'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }

}
