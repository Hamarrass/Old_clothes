<?php

namespace App\Http\Controllers;

use App\Home;
use App\InfoPositionVendeur;
use App\InformationVendeur;
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
    public function index()
    {
        return view('informationclient');
    }

    public  function socret(){
        return view('socret');
    }



}
