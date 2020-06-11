<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\MentalRotaciaTest;

class MentalRotaciaTestRepositories extends Repository
{
    function model()
    {
     return MentalRotaciaTest::class;   // TODO: Implement model() method.
    }

    function MentalComparetoani($uuid){
//        dd($uuid);
        return $this->startCounditions()->MentalCompare($uuid);
    }

}
