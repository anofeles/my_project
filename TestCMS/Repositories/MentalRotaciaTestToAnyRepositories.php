<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\MentalRotaciaTestToAny;

class MentalRotaciaTestToAnyRepositories extends Repository
{
    function model()
    {
     return MentalRotaciaTestToAny::class;  // TODO: Implement model() method.
    }

}
