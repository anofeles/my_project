<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SignalDetecTest;

class SignalDetecTestRepositories extends Repository
{
    function model()
    {
     return SignalDetecTest::class;   // TODO: Implement model() method.
    }

    function Signaltoanijoin($uuid){
         return $this->startCounditions()->Signaltoani($uuid);
    }

}
