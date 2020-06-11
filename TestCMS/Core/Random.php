<?php
/**
 * Created by PhpStorm.
 * User: jedy
 * Date: 7/15/18
 * Time: 6:07 PM
 */

namespace TestCMS\Core;


class Random
{

    public static function generate($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
