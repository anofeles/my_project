<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SelectionTest;

class SelectionTestRepositories extends Repository
{
    function model()
    {
     return SelectionTest::class;   // TODO: Implement model() method.
    }


    function Selectiontoani($uuid){
        return $this->startCounditions()->Selectiontoani($uuid);
    }

}
