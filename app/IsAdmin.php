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
     * Проверка на авторизацию админа
     *
     * @return int
     */
    public function isAdminChecker()
    {
        $isAdmin = $this->request->session()->get( 'is_admin' );

        if( $isAdmin == 0 ) {
            return 0;
        } else {
            return 1;
        }
    }

}
