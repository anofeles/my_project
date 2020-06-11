<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\PerceftCompareTestDiagram;

class PerceftCompareTestDiagramRepositories extends Repository
{
    function model()
    {
        return PerceftCompareTestDiagram::class; // TODO: Implement model() method.
    }
}
