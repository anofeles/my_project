<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\Tests;

class TestsRepositories extends Repository
{
    function model()
    {
        return Tests::class;   // TODO: Implement model() method.
    }

}
