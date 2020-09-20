<?php

namespace App\Http\Controllers;

use App\InfoPositionVendeur;
use App\InformationVendeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationVendeurController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }




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



    public function edit(InformationVendeur $infomrationClient)
    {
        InformationVendeur::destroy($infomrationClient);
        return  redirect()->back();
    }





}
