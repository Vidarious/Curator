<?php

/*
|--------------------------------------------------------------------------
| Curator: Login Controller
|--------------------------------------------------------------------------
|
| This is Curator's user login controller.
|
*/

namespace Curator\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    //Curator login page.
    public function loginForm()
    {
        return view('curator::pages.login');
    }
}
