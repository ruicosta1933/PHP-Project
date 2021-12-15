<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
     * @return array
     */
    public function index()
    {
        if (auth()->user()->level == "4") {
            return view('dashboard');
        } elseif (auth()->user()->level == "3") {
            return view('welcome');
        } elseif (auth()->user()->level == "1") {
            return redirect()->away('../../../../index.php');
        }
    }
}
