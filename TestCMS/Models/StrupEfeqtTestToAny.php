<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class StrupEfeqtTestToAny extends Model
{
    protected $table = 'strup_efeqt_test_to_any';
    public $timestamps = false;
    protected $fillable = [
        'strup_efeqt_test_uuid','row_uuid','type','empti'
    ];
    static function befbeforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
