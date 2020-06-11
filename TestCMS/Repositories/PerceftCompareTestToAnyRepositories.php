<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\PerceftCompareTestToAny;

class PerceftCompareTestToAnyRepositories extends Repository
{
    function model()
    {
       return PerceftCompareTestToAny::class; // TODO: Implement model() method.
    }

}
