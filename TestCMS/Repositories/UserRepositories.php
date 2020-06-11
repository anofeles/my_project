<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\User;

class UserRepositories extends Repository
{
    function model()
    {
     return User::class;   // TODO: Implement model() method.
    }

}
