<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\InfgadprocTestDiagram;

class InfgadprocTestDiagramRepositories extends Repository
{
    function model()
    {
     return InfgadprocTestDiagram::class;   // TODO: Implement model() method.
    }

}
