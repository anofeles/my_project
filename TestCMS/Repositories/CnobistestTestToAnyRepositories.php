<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\CnobistestTestToAny;

class CnobistestTestToAnyRepositories extends Repository
{
    function model()
    {
     return CnobistestTestToAny::class;   // TODO: Implement model() method.
    }

}
