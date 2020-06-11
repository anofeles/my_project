<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\StrupEfeqtTestDiagram;

class StrupEfeqtTestDiagramRepositories extends Repository
{
    function model()
    {
     return StrupEfeqtTestDiagram::class;   // TODO: Implement model() method.
    }

}
