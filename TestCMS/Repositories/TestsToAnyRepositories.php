<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\TestsToAny;

class TestsToAnyRepositories extends Repository
{
    function model()
    {
     return TestsToAny::class;   // TODO: Implement model() method.
    }

}
