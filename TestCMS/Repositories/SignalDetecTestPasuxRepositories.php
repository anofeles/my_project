<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SignalDetecTestPasux;

class SignalDetecTestPasuxRepositories extends Repository
{
    function model()
    {
        return SignalDetecTestPasux::class;// TODO: Implement model() method.
    }

}
