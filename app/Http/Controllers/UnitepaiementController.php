<?php

namespace App\Http\Controllers;

use App\func;
use App\unitepaiement;
use Illuminate\Http\Request;

class UnitepaiementController extends Controller
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
        $UNITS=unitepaiement::all();
        return view('gestionunitepaiement',compact('UNITS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $UNIT=null;
        return view('ajoutunitepaiement',compact('UNIT'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        unitepaiement::create([
            'name' => $request->name,
            'slug' => func::random(15),
            'description' => $request->description,
        ]);


        return redirect()->route('unitepaiements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\filieres  $unite
     * @return \Illuminate\Http\Response
     */
    public function show($unite)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\filieres  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit($unite)
    {

        $UNIT=unitepaiement::find($unite);
        return view('ajoutunitepaiement',compact('UNIT'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\filieres  $unite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$unite)
    {

        $UNIT=unitepaiement::find($unite);
        $UNIT->name=$request->name;
        $UNIT->description=$request->description;
        $UNIT->save();
        return redirect()->route('unitepaiements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\filieres  $unite
     * @return \Illuminate\Http\Response
     */
    public function destroy($unite)
    {

        $UNIT=unitepaiement::find($unite);
        $UNIT->delete();
        return redirect()->route('unitepaiements.index');
    }
}
