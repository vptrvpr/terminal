<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutIndex()
    {
        return view( 'pages.about' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contactsIndex()
    {
        return view( 'pages.contacts' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fz54Index()
    {
        return view( 'pages.fz54' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sofdIndex()
    {
        return view( 'pages.fz54.sofd' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function kas2gIndex()
    {
        return view( 'pages.fz54.kas2g' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function kzokvn()
    {
        return view( 'pages.fz54.kzokvn' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pnf()
    {
        return view( 'pages.fz54.pnf' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function nor()
    {
        return view( 'pages.fz54.nor' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function novyeObjazatelnyeRekvizityChekovKktIBso()
    {
        return view( 'pages.fz54.novyeObjazatelnyeRekvizityChekovKktIBso' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function onlaynKassyDlyaIpNaEnvdIPsnOtsrochkaDo2021Goda()
    {
        return view( 'pages.fz54.onlaynKassyDlyaIpNaEnvdIPsnOtsrochkaDo2021Goda' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function nalogovyjVychetZaOnlajnKassu()
    {
        return view( 'pages.fz54.nalogovyjVychetZaOnlajnKassu' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function komuNuzhnoStavitKassovyjApparat()
    {
        return view( 'pages.fz54.komuNuzhnoStavitKassovyjApparat' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function kakSnyatSUchetaOnlineKassu()
    {
        return view( 'pages.fz54.kakSnyatSUchetaOnlineKassu' );
    }


    /**
     * Налогвый вычет
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function taxDeduction()
    {
        return view('pages.taxDeduction');
    }
}
