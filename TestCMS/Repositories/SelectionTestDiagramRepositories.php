<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SelectionTestDiagram;

class SelectionTestDiagramRepositories extends Repository
{
    function model()
    {
     return SelectionTestDiagram::class;   // TODO: Implement model() method.
    }

}
