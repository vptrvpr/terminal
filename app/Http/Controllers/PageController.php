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
    public function fz54Index(){
        return view('pages.fz54');
    }
    public function sofdIndex(){
        return view('pages.fz54.sofd');
    }
    public function kas2gIndex(){
        return view('pages.fz54.kas2g');
    }
    public function kzokvn(){
        return view('pages.fz54.kzokvn');
    }
    public function pnf(){
        return view('pages.fz54.pnf');
    }
    public function nor(){
        return view('pages.fz54.nor');
    }

}
