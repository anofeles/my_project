<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SelectionTestPasux;

class SelectionTestPasuxRepositories extends Repository
{
    function model()
    {
     return SelectionTestPasux::class;   // TODO: Implement model() method.
    }

}
