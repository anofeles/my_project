<?php


namespace TestCMS\Repositories;


use TestCMS\Core\Database\Repository;
use TestCMS\Models\Menu;

class MenuRepositories extends Repository
{
    function model()
    {
        return Menu::class;   // TODO: Implement model() method.
    }

}
