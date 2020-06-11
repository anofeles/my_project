<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\LewsgadTestParts;

class LewsgadTestPartsRepositories extends Repository
{
    function model()
    {
     return LewsgadTestParts::class;   // TODO: Implement model() method.
    }

}
