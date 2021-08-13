<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckAPIController extends Controller
{
    function getData(){
        return ["name"=> "rabbia",
        "email"=> "rabbia@gmail.com"];
    }
}
