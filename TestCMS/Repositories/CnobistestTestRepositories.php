<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\CnobistestTest;

class CnobistestTestRepositories extends Repository
{
    function model()
    {
     return CnobistestTest::class;   // TODO: Implement model() method.
    }
    function cnobistest($uuid){
//        dd($uuid);
        return $this->startCounditions()->cnobistest($uuid);
    }
}
