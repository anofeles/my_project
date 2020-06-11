<?php

/**

 * Created by PhpStorm.

 * User: jedy

 * Date: 11/15/18

 * Time: 1:28 PM

 */



namespace TestCMS\Http\Requests\Manager;





use Illuminate\Foundation\Http\FormRequest;



class Request extends FormRequest

{

    /**

     * Determine if the user is authorized to make this request.

     *

     * @return bool

     */

    public function authorize()

    {

        return true;

    }



    public function rules(){

        return [];

    }



}

