<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\ReaqciYuradgTest;

class ReaqciYuradgRepositories extends Repository
{
    function model()
    {
     return ReaqciYuradgTest::class;   // TODO: Implement model() method.
    }
    function ReaqciCompare($uuid){
        return $this->startCounditions()->ReaqciCompare($uuid);
    }
}
