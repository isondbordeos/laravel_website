<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index(){
        return "This is about page";
    }

    public function contactMethod(){
        return "This is contact page";
    }
}
