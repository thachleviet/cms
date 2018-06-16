<?php
/**
 * Created by PhpStorm.
 * User: huuda
 * Date: 6/12/2018
 * Time: 11:56 PM
 */

namespace Modules\Staff\Http\Controllers;


use App\Http\Controllers\Controller;

class BaseController  extends Controller
{
    public function __construct()
    {
    }

    public static function print($attribute){
        echo '<pre>';
        print_r($attribute);
        echo '</pre>';
        die();
    }

    public static function var_dum($attribute){
        echo '<pre>';
        var_dump($attribute);
        echo '</pre>';
        die();
    }
}