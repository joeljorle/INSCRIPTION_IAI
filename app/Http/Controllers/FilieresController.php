<?php

namespace App\Http\Controllers;

use App\filieres;
use App\func;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FilieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $FILS=filieres::all();
        return view('gestionfiliere',compact('FILS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $FIL=null;
        return view('ajoutfiliere',compact('FIL'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        filieres::create([
            'name' => $request->name,
            'slug' => func::random(15),
            'description' => $request->description,
        ]);


        return redirect()->route('filieres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\filieres  $filieres
     * @return \Illuminate\Http\Response
     */
    public function show($filieres)
    {

        $FIL=filieres::find($filieres);
        return view('profilefiliere',compact('FIL'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\filieres  $filieres
     * @return \Illuminate\Http\Response
     */
    public function edit($filieres)
    {

        $FIL=filieres::find($filieres);
        return view('ajoutfiliere',compact('FIL'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\filieres  $filieres
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$filieres)
    {

        $FIL=filieres::find($filieres);
        $FIL->name=$request->name;
        $FIL->description=$request->description;
        $FIL->save();
        return redirect()->route('filieres.show',[$FIL]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\filieres  $filieres
     * @return \Illuminate\Http\Response
     */
    public function destroy($filieres)
    {

        $FIL=filieres::find($filieres);
        $FIL->delete();
        return redirect()->route('filieres.index');
    }
}
