<?php

namespace App\Http\Controllers;

use App\func;
use App\paiementdistance;
use Illuminate\Http\Request;

class PaiementdistanceController extends Controller
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

        $PDISTS=paiementdistance::all();
        return view('gestionpaiementdistance',compact('PDISTS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $PDIST=null;
        return view('ajoutpaiementdistance',compact('PDIST'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        paiementdistance::create([
            'name' => $request->name,
            'slug' => func::random(15),
            'logo'=>$request->logo,
            'url'=>$request->url,
            'description' => $request->description,
        ]);


        return redirect()->route('paiementdistances.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\paiementdistances  $paiementdistances
     * @return \Illuminate\Http\Response
     */
    public function show($paiementdistances)
    {

        $PDIST=paiementdistance::find($paiementdistances);
        return view('gestionpaiementdistance',compact('PDIST'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\paiementdistances  $paiementdistances
     * @return \Illuminate\Http\Response
     */
    public function edit($paiementdistances)
    {

        $PDIST=paiementdistance::find($paiementdistances);
        return view('ajoutpaiementdistance',compact('PDIST'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\paiementdistances  $paiementdistances
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$paiementdistances)
    {

        $PDIS=paiementdistance::find($paiementdistances);
        $PDIS->name=$request->name;
        $PDIS->description=$request->description;
        $PDIS->save();
        return redirect()->route('paiementdistances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\paiementdistances  $paiementdistances
     * @return \Illuminate\Http\Response
     */
    public function destroy($paiementdistances)
    {
        $PDIST=paiementdistance::find($paiementdistances);
        $PDIST->delete();
        return redirect()->route('paiementdistances.index');
    }
}
