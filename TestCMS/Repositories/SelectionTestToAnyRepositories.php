<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SelectionTestToAny;

class SelectionTestToAnyRepositories extends Repository
{
    function model()
    {
     return SelectionTestToAny::class;   // TODO: Implement model() method.
    }

}
