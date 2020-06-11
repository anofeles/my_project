<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\LewsgadTestToAny;

class LewsgadTestToAnyRepositories extends Repository
{
    function model()
    {
     return LewsgadTestToAny::class;   // TODO: Implement model() method.
    }

}
