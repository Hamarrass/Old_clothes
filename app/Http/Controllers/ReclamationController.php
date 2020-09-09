<?php

namespace App\Http\Controllers;

use App\Reclamation;
use App\TypeReclamation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReclamationController extends Controller
{

    public function index()
    {
        $type_reclamations= TypeReclamation::cursor();

        //the number of complaints  with answer
        $reclamations         = DB::table('reclamations')->whereNotNull('reponse_gestionnaire')->paginate(6);
        $reclamationssent     = count($reclamations);

        //the number of complaints  without answer
        $reclamations         = Reclamation::with('type_reclamations')->whereNull('reponse_gestionnaire')->paginate(6);
        $reclamationsreceived = count($reclamations);

        return  view('reclamation',compact('reclamations','reclamationsreceived','reclamationssent','type_reclamations'));

////      DB::connection()->enableQueryLog();
//
//        $type_reclamation = Reclamation::with('type_reclamations')->get();
////
////     dd(DB::getQueryLog());
//        foreach ($type_reclamation as $item){
//
//                    echo '<br>'.$item->type_reclamations->id.'<br>';
//
//              }
//  exit();

    }

    public function inbox()
    {

        return redirect()->route('reclamations.index');

    }


    public function sent()
    {
        $type_reclamations= TypeReclamation::cursor();

        //the number of complaints  without answer
        $reclamations         = DB::table('reclamations')->whereNull('reponse_gestionnaire')->paginate(6);
        $reclamationsreceived = count($reclamations);

        //the number of complaints  with answer
        $reclamations         = Reclamation::with('type_reclamations')->whereNotNull('reponse_gestionnaire')->paginate(6);
        $reclamationssent     = count($reclamations);

        return  view('reclamation',compact('reclamations','reclamationssent','reclamationsreceived','type_reclamations'));

    }



    public function store(Request $request)
    {
        $request->validate([
            'reclamation' => 'required',
            'observation_client' => 'required',
        ]);

        $reclamation = new Reclamation();
        $reclamation->type_reclamation_id  = $request->input('reclamation');
        $reclamation->observation_client   = $request->input('observation_client');
        $reclamation->compagnie_id         = $request->input('compagnie_id');
        $reclamation->dossier_id           = 1;
        $reclamation->client               = 'Hassane Hamarrass';
        $reclamation->save();

        return redirect()->route('reclamations.index');
    }


    public function show($reclamation)
    {
        //this command means the people who see this message in the inbox
        $reclamation = Reclamation::find($reclamation);
        $reclamation->seen_by =  '1';
        $reclamation->save();

        //the number of complaints  without answer
        $reclamations         = DB::table('reclamations')->whereNull('reponse_gestionnaire')->get();
        $reclamationsreceived = count($reclamations);

        //the number of complaints  with answer
        $reclamations         = DB::table('reclamations')->whereNotNull('reponse_gestionnaire')->get();
        $reclamationssent     = count($reclamations);

        $reclamation          = Reclamation::find($reclamation->id);


        return  view('replyreclamation',compact('reclamation','reclamationsreceived','reclamationssent'));
    }


    public function update(Request $request,$reclamation)
    {

        $reclamation = Reclamation::find($reclamation);
        $reclamation->reponse_gestionnaire = $request->get('reponse_gestionnaire');
        $reclamation->user_id =  Auth::user()->id;
        $reclamation->save();

        return redirect()->route('reclamations.index');

//        return redirect('/coronas')->with('success', 'Corona Case Data is successfully updated');
    }


}
