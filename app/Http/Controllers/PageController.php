<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutIndex(){
        return view('pages.about');
    }
    public function contactsIndex(){
        return view('pages.contacts');
    }
}
