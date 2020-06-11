<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\LewsgadTest;

class LewsgadTestRepositories extends Repository
{
    function model()
    {
     return LewsgadTest::class;   // TODO: Implement model() method.
    }
    function Lewsgadtest($uuid){
        return $this->startCounditions()->Lewsgadtest($uuid);
    }
}
