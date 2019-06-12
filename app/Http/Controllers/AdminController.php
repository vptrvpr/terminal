<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\IsAdmin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @var IsAdmin
     */
    protected $isAdmin;


    /**
     * AdminController constructor.
     *
     * @param IsAdmin $isAdmin
     */
    public function __construct( IsAdmin $isAdmin )
    {
        $this->isAdmin = $isAdmin;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->isAdmin->isAdminChecker();

        return view( 'admin.index' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminProducts()
    {
        $this->isAdmin->isAdminChecker();

        return view( 'admin.products' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminPartners()
    {
        $this->isAdmin->isAdminChecker();

        return view( 'admin.partners' );
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminSliders()
    {
        $this->isAdmin->isAdminChecker();

        return view( 'admin.sliders' );
    }


    public function adminRecommendeds()
    {
        $this->isAdmin->isAdminChecker();

        return view( 'admin.recommended' );
    }


    public function getCategories()
    {
        $this->isAdmin->isAdminChecker();

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
