<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;

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
    public function codigos()
    {
        $jsonFilePath = storage_path('app/codigos_presenca.json');
    
        if (File::exists($jsonFilePath)) {
            $jsonData = File::get($jsonFilePath);
            $data = json_decode($jsonData, true);
            /* @dd($data); */
            return view('json', compact('data'));
            /* return view('test', compact('data')); */
        } else {
            return view('json')->with('data', []); // Ou qualquer valor padrão que você queira usar
        }
    }
    
}
