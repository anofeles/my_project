<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\CnobistestTestDiagram;

class CnobistestTestDiagramRepositories extends Repository
{
    function model()
    {
     return CnobistestTestDiagram::class;   // TODO: Implement model() method.
    }

}
