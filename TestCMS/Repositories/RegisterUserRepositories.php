<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\RegisterUser;

class RegisterUserRepositories extends Repository
{
    function model()
    {
     return RegisterUser::class;   // TODO: Implement model() method.
    }

    function Registertoanirepo($id){
        return $this->startCounditions()->Registertoani($id);
    }

}
