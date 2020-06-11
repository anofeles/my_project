<?php

/**

 * Created by PhpStorm.

 * User: jedy

 * Date: 11/9/18

 * Time: 12:51 PM

 */







if (!function_exists('assets'))

{

    /**

     * @param string $path

     * @param bool $secure

     * @return string

     */

    function assets(string $path = '' , bool $secure = false)

    {

        return app('url')->asset('/assets/'.$path, $secure);

    }

}





//if (!function_exists('getLocales'))

//{

//

//    function getLocales($defaultOnly = false)

//    {

//        $locales = new \TestCMS\Models\Locale();

//

//        if ($defaultOnly){

//            $locales->where('is_default',true);

//        }

//

//        return $locales->orderBy('is_default','DESC')->get();

//    }

//}





if (!function_exists('setActive'))

{

    /**

     * @param $route

     * @return string

     */

    function setActive($route)

    {

        return  request()->is($route) ? 'active':'';

    }

}



//if(!function_exists('getUrl'))

//{

//    function getUrl($url){

//        $locale = \Illuminate\Support\Facades\App::getLocale();

//        $defLocale = getLocales(true);

//        if (isset($defLocale->locale ) && $defLocale->locale == $locale)

//            return url($url);

//        return url($locale.'/'.$url);

//    }

//}



if (!function_exists('t'))

{

    function t(string $key)

    {

        $translation = \TestCMS\Models\Translation::where('key',$key)->first();

//        dd($translation->value);

        if ($translation !== null)

            return $translation->value;

        return $key;

    }

}



if (!function_exists('fixLanguageUrl'))

{

    function fixLanguageUrl($locale){



        $url = explode('/',Request::url());

        $newUrl = '';



        if (isset($url[3]) ){

            $newUrl .= $locale;

            for ($i =3 ; $i < count($url)  ; $i++){

                if ($url[$i]  !== 'ka' && $url[$i]  !== 'en') {

                    $newUrl .= '/'.$url[$i];

                }

            }

        }elseif(!isset($url[3])){

            $newUrl = $locale;

        }

        return url($newUrl);

    }

}

