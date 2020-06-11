<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SelectionTestParts;

class SelectionTestPartsRepositories extends Repository
{
    function model()
    {
     return SelectionTestParts::class;   // TODO: Implement model() method.
    }

}
