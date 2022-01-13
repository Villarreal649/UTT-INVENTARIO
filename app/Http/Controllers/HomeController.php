<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Resguardo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
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
        $productos = Producto::all();
        return view('home', compact('productos'));

    }

}
