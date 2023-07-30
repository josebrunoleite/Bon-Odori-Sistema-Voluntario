<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
    public function index()
    {
        return view('home');
    }
    public function sobreyou()
    {   
        $id = auth()->id();
        $user = User::find($id);
        return view('anothers.you', ['user' => $user]);
    }
    public function info()
    {
        return view('anothers.info');
    }
}
