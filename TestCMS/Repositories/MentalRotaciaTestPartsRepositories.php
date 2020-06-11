<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\MentalRotaciaTestParts;

class MentalRotaciaTestPartsRepositories extends Repository
{
    function model()
    {
     return MentalRotaciaTestParts::class;   // TODO: Implement model() method.
    }

}
