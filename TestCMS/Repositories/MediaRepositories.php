<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\Media;

class MediaRepositories extends Repository
{
    function model()
    {
     return Media::class;   // TODO: Implement model() method.
    }

}
