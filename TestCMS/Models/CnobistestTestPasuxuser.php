<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class CnobistestTestPasuxuser extends Model
{
    protected $table = 'cnobistest_test_pasuxuser';
    protected $fillable = [
        'userAnswer',
        'answerTime',
        'isUserAnswerCorrect',
        'answered',
        'sequence',
        'realAnswer',
        'symbol',
        'showTimeText',
        'testuuid',
        'datauser',
        'user_uuid'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
