<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SignalDetecTestPasuxuser;

class SignalDetecTestPasuxuserRepositories extends Repository
{
    function model()
    {
     return SignalDetecTestPasuxuser::class;   // TODO: Implement model() method.
    }

}
