<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\InfgadprocTestParts;

class InfgadprocTestPartsRepositories extends Repository
{
    function model()
    {
     return InfgadprocTestParts::class;   // TODO: Implement model() method.
    }

}
