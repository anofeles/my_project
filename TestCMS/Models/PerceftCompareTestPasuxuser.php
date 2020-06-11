<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class PerceftCompareTestPasuxuser extends Model
{
    protected $table = 'perceft_compare_test_pasuxuser';
    protected $fillable = [
        'persbig','persbigpass','momxpasux','pasuxdro','upasuxtuara','sworipasux','testuuid','datauser','user_uuid','seqtorei','similarityType'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
