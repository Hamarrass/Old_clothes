<?php

namespace App\Http\Controllers;

use App\TypeReclamation;
use Illuminate\Http\Request;

class TypeReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TypeReclamation  $typeReclamation
     * @return \Illuminate\Http\Response
     */
    public function show(TypeReclamation $typeReclamation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypeReclamation  $typeReclamation
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeReclamation $typeReclamation)
    {
        dd("okay");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypeReclamation  $typeReclamation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeReclamation $typeReclamation)
    {
        dd("okay");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypeReclamation  $typeReclamation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeReclamation $typeReclamation)
    {
        //
    }
}
