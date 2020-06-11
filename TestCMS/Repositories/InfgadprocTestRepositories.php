<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\InfgadprocTest;

class InfgadprocTestRepositories extends Repository
{
    function model()
    {
     return InfgadprocTest::class;   // TODO:  Implement model() method.
    }
    function Infgadproctest($uuid){
//        dd($uuid);
        return $this->startCounditions()->Infgadproctest($uuid);
    }
}
