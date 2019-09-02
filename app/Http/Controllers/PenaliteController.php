<?php

namespace App\Http\Controllers;

use App\error;
use App\etudiant;
use App\filieres;
use App\func;
use App\moratoire;
use App\penalite;
use App\unitepaiement;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as BaseCollection;

class PenaliteController extends Controller
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

        $MORATS = moratoire::all();
        $PENALS = penalite::all();
        $COUT_MORATS=func::COUT_MORATS();
        $COUT_PENAL=func::COUT_PENAL();
        return view('gestionpenalitemoratoire', compact('MORATS', 'PENALS','COUT_MORATS','COUT_PENAL'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $FILS=filieres::all(); $UNITS=unitepaiement::all();$PENAL=null;

         $ERRORS=$this->verifier($UNITS,$FILS);
        if($ERRORS==null)  return view('ajoutpenalite',compact('FILS','UNITS','PENAL'));
        else return view('errormodel',compact('ERRORS'));
    }

    public function create1($unite, $etudiant)
    {
        $PENAL = null;
        $UNITE = unitepaiement::find($unite);
        $ETUDIANT = etudiant::find($etudiant);
        return view('ajoutpenalite', compact('PENAL', 'UNITE', 'ETUDIANT'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        penalite::create([
            'name' => $request->name,
            'slug' => func::random(15),
            'idunite' => $request->unite,
            'idfiliere' => $request->filiere,
            'frequence' => $request->frequence,
            'periode' => $request->periode,
            'montant' => $request->montant,
            'delais' => $request->delais,
            'description' => $request->description,
        ]);


        return redirect()->route('penalites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\penalitees $penalitees
     * @return \Illuminate\Http\Response
     */
    public function show($penalites)
    {

        $PENAL = penalite::find($penalites);
        return view('gestionpenalite', compact('PENAL'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\penalites $penalites
     * @return \Illuminate\Http\Response
     */
    public function edit($penalites)
    {

        $PENAL = penalite::find($penalites);
        $FILS=filieres::all(); $UNITS=unitepaiement::all();
        return view('ajoutpenalite', compact('PENAL','FILS','UNITS'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\penalitees $penalitees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $penalites)
    {

        $PENAL = penalite::find($penalites);
        $PENAL->name = $request->name;
        $PENAL->idunite = $request->unite;
        $PENAL->idfiliere = $request->filiere;
        $PENAL->frequence=$request->frequence;
        $PENAL->periode=$request->periode;
        $PENAL->montant=$request->montant;
        $PENAL->delais = $request->delais;
        $PENAL->save();
        return redirect()->route('penalites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\penalitees $penalitees
     * @return \Illuminate\Http\Response
     */
    public function destroy($penalites)
    {

        $PENAL = penalite::find($penalites);
        $PENAL->delete();
        return redirect()->route('penalites.index');
    }

    public function eraseall()
    {
        foreach (etudiant::all() as $ETUD)
        {
            $ETUD->montantpenalite=0;
            $ETUD->save;
        }

     return redirect()->back();
    }

    public function eraseallmodel()
    {
        foreach (penalite::all() as $PENAL)
        $PENAL->delete();
        return redirect()->back();
    }

    public function verifier($UNITS,$FILS)
    {$ERRORS=null;


        if(count($UNITS)==0) {
            $ERRORS =($ERRORS==null)? new BaseCollection():$ERRORS;
            $ERROR = new error();
            $ERROR->route = 'unitepaiements.create';
            $ERROR->msg = " Il n'existe aucune unite de paiement veuillez dabord enregistrer au moins une unite. Le model de penalite doit etre affecter a une unite";
            $ERROR->btn_msg = 'Creer une unite';
            $ERRORS->add($ERROR);
        }
        if(count($FILS)==0) {
            $ERRORS =($ERRORS==null)? new BaseCollection():$ERRORS;
            $ERROR = new error();
            $ERROR->route = 'filieres.create';
            $ERROR->msg = "Il n'existe aucune filiere veuillez dabord enregistrer au moins une filiere. Le model de penalite doit etre affecter a une filiere";
            $ERROR->btn_msg = 'Creer une filiere';
            $ERRORS->add($ERROR);
        }


        return $ERRORS;

    }
}
    
