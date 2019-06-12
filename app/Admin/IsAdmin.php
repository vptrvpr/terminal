<?php
/**
 * Created by PhpStorm.
 * User: Zver
 * Date: 06.04.2019
 * Time: 18:56
 */

namespace App;


use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * @var Request
     */
    protected $request;


    /**
     * IsAdmin constructor.
     *
     * @param Request $request
     */
    public function __construct( Request $request )
    {
        $this->request = $request;
    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function isAdminChecker()
    {
        $isAdmin = $this->request->session()->get( 'is_admin' );

        if( $isAdmin == 0 ) {
            return redirect()->route( 'admin.home' )->send();
        }
    }

}
