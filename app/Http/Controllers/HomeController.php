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
        dd('okay  go to the controller directly to HomeCOntroller you will find me  don\'t worry okay');
//        $images = InfoPositionVendeur::with('information_vendeurs')->where('user_id',Auth::user()->id)->get();
//        return view('informationvendeur',compact('images'));


        return view('informationclient');
    }



}
