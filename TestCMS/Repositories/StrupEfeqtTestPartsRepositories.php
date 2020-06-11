<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\StrupEfeqtTestParts;

class StrupEfeqtTestPartsRepositories extends Repository
{
    function model()
    {
     return StrupEfeqtTestParts::class;   // TODO: Implement model() method.
    }

}
