<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class SelectionTestPasuxuser extends Model
{
    protected $table = 'selection_test_pasuxuser';
    protected $fillable = [
        'variant','dashoreba','pirveliaso','meoreaso','momxpasux','pasuxdro','upasuxtuara','sworipasux','testuuid','datauser','user_uuid','aimStimul','distractor','distractorType'
    ];

    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }

}
