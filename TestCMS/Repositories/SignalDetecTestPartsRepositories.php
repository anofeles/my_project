<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SignalDetecTestParts;

class SignalDetecTestPartsRepositories extends Repository
{
    function model()
    {
        return SignalDetecTestParts::class;   // TODO: Implement model() method.
    }
}
