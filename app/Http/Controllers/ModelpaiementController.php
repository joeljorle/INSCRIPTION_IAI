<?php

namespace App\Http\Controllers;

use App\error;
use App\filieres;
use App\func;
use App\modelpaiement;
use App\unitepaiement;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as BaseCollection;

class ModelpaiementController extends Controller
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
        $MODELS=modelpaiement::all();
        return view('gestionmodelpaiement',compact('MODELS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $MODEL=null;$FILS=filieres::all();$UNITS=unitepaiement::all();

        $ERRORS=$this->verifier($UNITS,$FILS);
        if($ERRORS==null) return view('ajoutmodelpaiement',compact('MODEL','FILS','UNITS'));
        else return view('errormodel',compact('ERRORS'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        modelpaiement::create([
            'name' => $request->name,
            'slug' => func::random(15),
            'idunite'=>$request->unite,
            'idfiliere'=>$request->filiere,
            'montant'=>$request->montant,
             'delais'=>$request->delais,
            'description' => $request->description,
        ]);


        return redirect()->route('modelpaiements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\modelpaiements  $modelpaiements
     * @return \Illuminate\Http\Response
     */
    public function show($modelpaiements)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\modelpaiements  $modelpaiements
     * @return \Illuminate\Http\Response
     */
    public function edit($modelpaiements)
    {

        $MODEL=modelpaiement::find($modelpaiements);
        $FILS=filieres::all();
        $UNITS=unitepaiement::all();
        return view('ajoutmodelpaiement',compact('MODEL','FILS','UNITS'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\modelpaiements  $modelpaiements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$modelpaiements)
    {

        $MODEL=modelpaiement::find($modelpaiements);
        $MODEL->name=$request->name;
        $MODEL->idunite=$request->unite;
        $MODEL->idfiliere=$request->filiere;
        $MODEL->montant=$request->montant;
        $MODEL->delais=$request->delais;
        $MODEL->description=$request->description;
        $MODEL->save();
        return redirect()->route('modelpaiements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\modelpaiements  $modelpaiements
     * @return \Illuminate\Http\Response
     */
    public function destroy($modelpaiements)
    {

        $MODEL=modelpaiement::find($modelpaiements);
        $MODEL->delete();
        return redirect()->route('modelpaiements.index');
    }

    public function verifier($UNITS,$FILS)
    {$ERRORS=null;

        if(count($FILS)==0) {
            $ERRORS = new BaseCollection();
            $ERROR = new error();
            $ERROR->route = 'filieres.create';
            $ERROR->msg = " Il n'existe aucune filiere veuillez dabord enregistrer au moins une filiere. Le model doit etre affecter a la filiere";
            $ERROR->btn_msg = 'Creer une filiere';
            $ERRORS->add($ERROR);
        }


        if(count($UNITS)==0) {
            $ERRORS =($ERRORS==null)? new BaseCollection():$ERRORS;
            $ERROR = new error();
            $ERROR->route = 'unitepaiements.create';
            $ERROR->msg = " Il n'existe aucune unite de paiement veuillez dabord enregistrer au moins une unite. Le model doit etre affecter a l'unite";
            $ERROR->btn_msg = 'Creer une unite';
            $ERRORS->add($ERROR);
        }


        return $ERRORS;

    }
}
