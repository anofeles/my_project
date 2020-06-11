<?php


namespace TestCMS\Http\Controllers\Manager;


use TestCMS\Http\Controllers\Controller;

class UserController extends Controller
{
    public function userfront(){
        return redirect('http://psychologytest.tsu.ge/assets/frontbild/');
    }

}
