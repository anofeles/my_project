<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;

class LewsgadTestPasuxuser extends Model
{
    protected $table = 'lewsgad_test_pasuxuser';
    protected $fillable = [
        'userAnswer',
        'answerTime',
        'isUserAnswerCorrect',
        'answered',
        'zeda',
        'qveda',
        'varinat',
        'showTimeText',
        'user_uuid',
        'testuuid'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
