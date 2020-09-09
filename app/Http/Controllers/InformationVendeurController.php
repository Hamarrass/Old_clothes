<?php

namespace App\Http\Controllers;

use App\InfoPositionVendeur;
use App\InformationVendeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationVendeurController extends Controller
{

    public function __construct(){
        $this->middleware("auth")->except('create');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $images = InfoPositionVendeur::with('information_vendeurs')->where('user_id',Auth::user()->id)->get();
        return view('informationvendeur',compact('images'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('ok');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req){


        $req->validate([
            'imageFile' => 'required|max:2048'
        ]);

        foreach ($req->file('imageFile') as $image) {

            $fileModel = new InformationVendeur();
            $fileName = Auth::user()->id.'_'.time() . '_'.date("Y-m-d").'_'. $image->getClientOriginalName();
            $image->move(public_path().'/images/'.Auth::user()->name.'_'.Auth::user()->id.'/', $fileName);
            $fileModel->name = $fileName;
            $fileModel->image_path = '/images/'.Auth::user()->name.'_'.Auth::user()->id.'/'. $fileName;
            $fileModel->user_id = Auth::user()->id;
            $fileModel->save();
        }


        return  redirect()->route('informationvendeurs.index');

               }

    /**
     * Display the specified resource.
     *
     * @param  \App\InformationVendeur  $infomrationClient
     * @return \Illuminate\Http\Response
     */
    public function show(InformationVendeur $infomrationClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InformationVendeur  $infomrationClient
     * @return \Illuminate\Http\Response
     */
    public function edit(InformationVendeur $infomrationClient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InformationVendeur  $infomrationClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InformationVendeur $infomrationClient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InformationVendeur  $infomrationClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformationVendeur $infomrationClient)
    {
        //
    }
}
