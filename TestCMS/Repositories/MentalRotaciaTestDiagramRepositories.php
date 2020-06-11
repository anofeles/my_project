<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\MentalRotaciaTestDiagram;

class MentalRotaciaTestDiagramRepositories extends Repository
{
    function model()
    {
        return MentalRotaciaTestDiagram::class;   // TODO: Implement model() method.
    }
}
