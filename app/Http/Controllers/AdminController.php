<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\IsAdmin;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    protected $isAdmin;


    public function __construct( IsAdmin $isAdmin )
    {
        $this->isAdmin = $isAdmin;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if( $this->isAdmin->isAdminChecker() == 0 ) {
            return \redirect()->route( 'admin.home' );
        }
        return view( 'admin.index' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminProducts()
    {
        if( $this->isAdmin->isAdminChecker() == 0 ) {
            return \redirect()->route( 'admin.home' );
        }
        return view( 'admin.products' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminPartners()
    {
        if( $this->isAdmin->isAdminChecker() == 0 ) {
            return \redirect()->route( 'admin.home' );
        }
        return view( 'admin.partners' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminSliders()
    {
        if( $this->isAdmin->isAdminChecker() == 0 ) {
            return \redirect()->route( 'admin.home' );
        }
        return view( 'admin.sliders' );
    }


    public function adminRecommendeds()
    {
        if( $this->isAdmin->isAdminChecker() == 0 ) {
            return \redirect()->route( 'admin.home' );
        }
        return view( 'admin.recommended' );
    }


    public function getCategories()
    {
        if( $this->isAdmin->isAdminChecker() == 0 ) {
            return \redirect()->route( 'admin.home' );
        }
        return [
            'categories' => Categorie::all(),
        ];
    }


    /**
     * Админ дормащнаяя страница
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminHome()
    {
        return view( 'admin.home' );
    }


    /**
     * Авторизация админа
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function authAdmin( Request $request )
    {
        if( $request->get( 'login' ) == config( 'admin.login' ) && $request->get( 'pass' ) == config( 'admin.pass' ) ) {
            $request->session()->put( 'is_admin', 1 );
            return \redirect()->route( 'admin' );
        } else {
            return \redirect( '/' );
        }

    }


}
