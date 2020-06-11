<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\CnobistestTestParts;

class CnobistestTestPartRepositories extends Repository
{
    function model()
    {
     return CnobistestTestParts::class;   // TODO: Implement model() method.
    }

}
