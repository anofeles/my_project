<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\Post;

class PostRepositories extends Repository
{
    function model()
    {
     return Post::class;   // TODO: Implement model() method.
    }

}
