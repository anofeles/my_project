<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\Translation;

class TranslationRepositories extends Repository
{
    function model()
    {
        return Translation::class;   // TODO: Implement model() method.
    }

}
