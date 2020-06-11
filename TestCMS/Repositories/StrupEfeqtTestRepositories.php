<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\StrupEfeqtTest;

class StrupEfeqtTestRepositories extends Repository
{
    function model()
    {
     return StrupEfeqtTest::class;  // TODO: Implement model() method.
    }

    function spruttoani($uuid){
        return $this->startCounditions()->spruttoani($uuid);
    }
}
