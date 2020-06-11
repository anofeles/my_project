<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\ReaqciYuradgTestParts;

class ReaqciYuradgPartRepositories extends Repository
{
    function model()
    {
     return ReaqciYuradgTestParts::class;   // TODO: Implement model() method.
    }

}
