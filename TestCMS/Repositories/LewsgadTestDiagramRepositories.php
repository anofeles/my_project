<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\LewsgadTestDiagram;

class LewsgadTestDiagramRepositories extends Repository
{
    function model()
    {
     return LewsgadTestDiagram::class;   // TODO: Implement model() method.
    }

}
