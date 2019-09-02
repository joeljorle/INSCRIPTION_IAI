<?php

namespace App\Http\Controllers;

use App\error;
use App\etudiant;
use App\func;
use App\moratoire;
use App\penalite;
use App\unitepaiement;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as BaseCollection;

class MoratoireController extends Controller
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

        $MORATS=moratoire::all();
        $PENALS=penalite::all();
        $COUT_MORATS=func::COUT_MORATS();
        $COUT_PENAL=func::COUT_PENAL();
        return view('gestionpenalitemoratoire',compact('MORATS','PENALS','COUT_MORATS','COUT_PENAL'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $MORAT=null; $ETUDS=etudiant::all(); $UNITS=unitepaiement::all();
        $ERRORS=$this->verifier($UNITS,$ETUDS);
        if($ERRORS==null) return view('ajoutmoratoire',compact('MORAT','ETUDS','UNITS'));
        else return view('errormodel',compact('ERRORS'));

    }


    public function create1($unite,$etudiant)
    {
        $MORAT=null;
        $UNITE=unitepaiement::find($unite);
        $ETUDIANT=etudiant::find($etudiant);
        return view('ajoutmoratoire',compact('MORAT','UNITE','ETUDIANT'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $morat=moratoire::create([
            'name' => $request->name,
            'slug' => func::random(15),
            'idunite'=>$request->unite,
            'idetudiant'=>$request->etudiant,
            'delais'=>$request->delais,
            'description' => $request->description,
        ]);

        $etudiant=$morat->ETUDIANT();
        $etudiant->moratoire=true;
        $etudiant->save();

        return redirect()->route('moratoires.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\moratoirees  $moratoirees
     * @return \Illuminate\Http\Response
     */
    public function show($moratoires)
    {
//        $MORAT=moratoire::find($moratoires);
//        return view('gestionmoratoire',compact('MORAT'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\moratoires  $moratoires
     * @return \Illuminate\Http\Response
     */
    public function edit($moratoires)
    {

        $MORAT=moratoire::find($moratoires);
        $ETUDS=etudiant::all();
        $UNITS=unitepaiement::all();
        return view('ajoutmoratoire',compact('MORAT','ETUDS','UNITS'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\moratoirees  $moratoirees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$moratoires)
    {

        $MORAT=moratoire::find($moratoires);
        $MORAT->name=$request->name;
        $MORAT->idunite=$request->unite;
        $MORAT->idetudiant=$request->etudiant;
        $MORAT->delais=$request->delais;
        $MORAT->save();
        return redirect()->route('moratoires.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\moratoirees  $moratoirees
     * @return \Illuminate\Http\Response
     */
    public function destroy($moratoires)
    {

        $MORAT=moratoire::find($moratoires);
        $MORAT->delete();
        return redirect()->route('moratoires.index');
    }

    public function erase($etudiant)
    {
        $ETUD=etudiant::find($etudiant);
        $MORAT=$ETUD->MORATOIRE();
        $MORAT->delete();
        return redirect()->back();
    }

     public function eraseall()
     {
         foreach (moratoire::all() as $morat);
         $morat->delete();
         return redirect()->back();
     }



    public function verifier($UNITS,$ETUDS)
    {$ERRORS=null;

        if(count($ETUDS)==0) {
            $ERRORS = new BaseCollection();
            $ERROR = new error();
            $ERROR->route = 'etudiants.create';
            $ERROR->msg = " Il n'existe aucun etudiant veuillez dabord enregistrer au moins un etudiant. Le moratoire doit etre affecter a l'etudiant";
            $ERROR->btn_msg = 'Creer un etudiant';
            $ERRORS->add($ERROR);
        }


        if(count($UNITS)==0) {
            $ERRORS =($ERRORS==null)? new BaseCollection():$ERRORS;
            $ERROR = new error();
            $ERROR->route = 'unitepaiements.create';
            $ERROR->msg = " Il n'existe aucune unite de paiement veuillez dabord enregistrer au moins une unite. Le moratoire doit etre affecter a l'unite";
            $ERROR->btn_msg = 'Creer une unite';
            $ERRORS->add($ERROR);
        }


        return $ERRORS;

    }
}
