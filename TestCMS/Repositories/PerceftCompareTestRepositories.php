<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\PerceftCompareTest;

class PerceftCompareTestRepositories extends Repository
{
    function model()
    {
        return PerceftCompareTest::class;// TODO: Implement model() method.
    }

    function PerceftCompareJoin($uuid){
        return $this->startCounditions()->PerceftCompare($uuid);
    }
}
