<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();
        if ($user->role == 'admin') {
            return redirect('admin');
        }
         elseif ($user->role == 'member'){
            return redirect('/');
        }
        elseif ($user->role == 'kasir') {
           return redirect('kasir');
        }
    }
}
