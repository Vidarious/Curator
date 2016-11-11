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

class LoginController extends Controller
{
    //Curator login page.
    public function Login()
    {
        return view('curator::pages.login');
    }
}
