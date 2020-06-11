<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\SignalDetecTestDiagram;

class SignalDetecTestDiagramRepositories extends Repository
{
    function model()
    {
     return SignalDetecTestDiagram::class;   // TODO: Implement model() method.
    }

}
