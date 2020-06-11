<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\RegisterUserToAny;

class RegisterUserToAnyRepositories extends Repository
{
    function model()
    {
     return RegisterUserToAny::class;   // TODO: Implement model() method.
    }

}
