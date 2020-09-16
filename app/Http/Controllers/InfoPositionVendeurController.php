<?php

namespace App\Http\Controllers;

use App\InfoPositionVendeur;
use App\InformationVendeur;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\http\Requests\ValidateInfoVendeur;


class InfoPositionVendeurController extends Controller
{


    public function store(ValidateInfoVendeur $request)
    {
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


    public function edit($id)
    {
        $data= InfoPositionVendeur::findOrFail($id);
//        if(Gate::denies("informativeness.update",$data)){
//            abort("406"," it is not your account");
//        }
        $this->authorize("update",$data);
        return $data;
    }




    public function update(Request $request, InfoPositionVendeur $infoPositionVendeur)
    {
        $info_about_position =InfoPositionVendeur::findOrFail($request->input('id'));

        $this->authorize("update",$info_about_position);
        $info_about_position->ville     =  $request->input('ville');
        $info_about_position->quartier  =  $request->input('quartier');
        $info_about_position->telephone =  $request->input('telephone');
        $info_about_position->used      = "1";
        $info_about_position->user_id   =  Auth::user()->id;
        $info_about_position->save();
        return true;

    }




    public function destroy($infoPositionVendeur)
    {
        $info_about_position =InfoPositionVendeur::find($infoPositionVendeur);
        $this->authorize("delete",$info_about_position);
        $info_about_position->delete();
        return  redirect()->back();
    }




    public function restore($id){
        $infovendeur=InfoPositionVendeur::onlyTrashed()->whereId($id)->first();
        $infovendeur->restore();
        return  redirect()->back();
    }




    public function forcedelete($id){
        $infovendeur=InfoPositionVendeur::onlyTrashed()->whereId($id)->first();
        $infovendeur->forceDelete();
        return  redirect()->back();
    }
}
