<?php

/*
|--------------------------------------------------------------------------
| Curator: Dashboard Controller
|--------------------------------------------------------------------------
|
| This is Curator's primary controller class for the admin dashboard.
|
*/

namespace Curator\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Curator index (public index) page.
    public function Home()
    {
        return view('curator::pages.home');
    }

    //Curator administrator dashboard.
    public function Dashboard()
    {
        return view('curator::pages.dashboard');
    }
}
