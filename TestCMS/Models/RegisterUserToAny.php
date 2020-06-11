<?php


namespace TestCMS\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class RegisterUserToAny extends Model
{
    protected $table = 'register_user_to_any';
    public $timestamps = false;
    protected $fillable = [
        'register_user_uuid','row_uuid','rype','empti','test_user'
    ];
    static function beforeBoot()
    {
        // TODO: Implement beforeBoot() method.
    }
}
