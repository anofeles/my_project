<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SignalDetecTestToAny;

class SignalDetecTestToAnyRepositories extends Repository
{
    function model()
    {
     return SignalDetecTestToAny::class;   // TODO: Implement model() method.
    }

}
