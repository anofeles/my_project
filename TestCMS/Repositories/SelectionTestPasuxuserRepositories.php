<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SelectionTestPasuxuser;

class SelectionTestPasuxuserRepositories extends Repository
{
    function model()
    {
        return SelectionTestPasuxuser::class;   // TODO: Implement model() method.
    }
}
