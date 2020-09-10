<?php

namespace App\Http\Controllers;

use App\InfoPositionVendeur;
use App\InformationVendeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\http\Requests\ValidateInfoVendeur;


class InfoPositionVendeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateInfoVendeur $request)
    {

//        $data=$request->only('ville','quartier','telephone');
//        $data['used']='1';
//        $data['used_id']=Auth::user()->id;
//        InfoPositionVendeur::create($data);
//        $request->validate([
//            'ville'=>'required|min:10|max:20',
//            'quartier'=>'required',
//            'telephone'=>'required'
//        ]);
        $info_about_position= new InfoPositionVendeur();
        $info_about_position->ville     =  $request->input('ville');
        $info_about_position->quartier  =  $request->input('quartier');
        $info_about_position->telephone =  $request->input('telephone');
        $info_about_position->used      = "1";
        $info_about_position->user_id   =  Auth::user()->id;
        $info_about_position->save();



        foreach ($request->file('imageFile') as $image) {

            $fileModel  = new InformationVendeur();
            $fileName   = Auth::user()->id.'_'.time() . '_'.date("Y-m-d").'_'. $image->getClientOriginalName();
            $image->move(public_path().'/images/'.Auth::user()->name.'_'.Auth::user()->id.'/', $fileName);
            $fileModel->name = $fileName;
            $fileModel->image_path = '/images/'.Auth::user()->name.'_'.Auth::user()->id.'/'. $fileName;
            $fileModel->info_position_vendeur_id =    $info_about_position->id ;
            $fileModel->user_id = Auth::user()->id;
            $fileModel->save();
        }
            $request->session()->flash("statut","a");
        return  redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InfoPositionVendeur  $infoPositionVendeur
     * @return \Illuminate\Http\Response
     */
    public function show(InfoPositionVendeur $infoPositionVendeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InfoPositionVendeur  $infoPositionVendeur
     * @return int
     */
    public function edit($id)
    {
        $data= InfoPositionVendeur::findOrFail($id);
        return $data;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfoPositionVendeur  $infoPositionVendeur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoPositionVendeur $infoPositionVendeur)
    {

        $info_about_position =InfoPositionVendeur::findOrFail($request->input('id'));
        $info_about_position->ville     =  $request->input('ville');
        $info_about_position->quartier  =  $request->input('quartier');
        $info_about_position->telephone =  $request->input('telephone');
        $info_about_position->used      = "1";
        $info_about_position->user_id   =  Auth::user()->id;
        $info_about_position->save();
        return $info_about_position->ville;;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfoPositionVendeur  $infoPositionVendeur
     * @return \Illuminate\Http\Response
     */
    public function destroy($infoPositionVendeur)
    {
//        dd($infoPositionVendeur);
        InfoPositionVendeur::destroy($infoPositionVendeur);

        return  redirect()->back();
    }
}
