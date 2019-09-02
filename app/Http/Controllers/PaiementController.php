<?php

namespace App\Http\Controllers;

use App\error;
use App\etudiant;
use App\func;
use App\modelpaiement;
use App\paiement;
use App\paiementdistance;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as BaseCollection;

class PaiementController extends Controller
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

        $PAIES=paiement::all();
        $MONTANT=func::PAIEMENTS();
        $RESTE=func::PAIEMENTS_RESTE();
        return view('gestionpaiement',compact('PAIES','MONTANT','RESTE'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $PAIE=null;
        $PDISTS=paiementdistance::all();
        $MODELS=modelpaiement::all();
        $ETUDS=etudiant::all();

        $ERRORS=$this->verifier($ETUDS,$MODELS);
        if($ERRORS==null)return view('ajoutpaiement1',compact('PAIE','PDISTS','ETUDS'));
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
       $PAIE=paiement::create([
            'slug' => func::random(15),
            'idrecu'=>$request->idrecu,
            'idetudiant'=>$request->etudiant,
            'montant'=>$request->montant,
            'idmode'=>$request->mode,
        ]);

        $ETUD=$PAIE->ETUDIANT();
        if($ETUD->VERSEMENT_TOTAL()>=$ETUD->FILIERE()->PENSION_TOTAL())
        {
            $ETUD->insolvable=false;
            $ETUD->save();
        }


        return redirect()->route('paiements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\paiements  $paiements
     * @return \Illuminate\Http\Response
     */
    public function show($paiements)
    {

        $PAIE=paiement::find($paiements);
        $ETUD=$PAIE->ETUDIANT();
        $REPARTITION=func::REPARTIR($ETUD,$PAIE->montant);
        $test=false;

        return view('ajoutpaiement3final',compact('PAIE','ETUD','REPARTITION','test'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\paiements  $paiements
     * @return \Illuminate\Http\Response
     */
    public function destroy($paiements)
    {
        $PAIE=paiement::find($paiements);
        $PAIE->delete();
        return redirect()->route('paiements.index');
    }


    public function store1(Request $request)
    {
      $ETUD=etudiant::find($request->etudiant);
      $ERRORS=$this->verifier1($ETUD);
      if($ERRORS==null) {
          $mode = $request->mode;
          if ($mode == 0) return view('ajoutpaiement2local', compact('ETUD', 'mode'));
          else {
              $PDIST = paiementdistance::find($request->mode);
              return view('ajoutpaiement2distant', compact('ETUD', 'PDIST'));
          }
      }else return view('errormodel',compact('ERRORS'));

    }

    public function store2(Request $request)
    {
      $ETUD=etudiant::find($request->etudiant);
      $mode=$request->mode;
      $PDIST=$request->mode==0?null:$request->mode;
      $versement=$request->versement;
      $test=true;
      $idrecu=func::random(20);
      $REPARTITION=func::REPARTIR($ETUD,$versement);
      $PAIE=null;
      $reste=$ETUD->FILIERE()->PENSION_TOTAL()-$versement;
      $reste=$reste<=0?0:$reste;

      return view('ajoutpaiement3final',compact('reste','ETUD','mode','PDIST','versement','REPARTITION','test','idrecu','PAIE'));
    }


    public function print(Request $request)
    {
        $ETUD=etudiant::find($request->etudiant);
        $mode=$request->mode;
        $PDIST=$request->mode==0?null:$request->mode;
        $versement=$request->montant;
        $idrecu=$request->montant;
        $REPARTITION=func::REPARTIR($ETUD,$versement);
        $PAIE=$request->paie==null?null:paiement::find($request->paie);
        $reste=$ETUD->FILIERE()->PENSION_TOTAL()-$versement;
        $reste=$reste<=0?0:$reste;

        return view('print',compact('reste','ETUD','mode','PDIST','versement','REPARTITION','idrecu','PAIE'));
    }



    public function verifier($ETUDS,$MODELS)
    {$ERRORS=null;

        if(count($ETUDS)==0) {
            $ERRORS = new BaseCollection();
            $ERROR = new error();
            $ERROR->route = 'etudiants.create';
            $ERROR->msg = " Il n'existe aucun etudiant veuillez dabord enregistrer au moins un etudiant. Le paiement concerne un etudiant";
            $ERROR->btn_msg = 'Creer un etudiant';
            $ERRORS->add($ERROR);

        }

        if(count($MODELS)==0) {
            $ERRORS = new BaseCollection();
            $ERROR = new error();
            $ERROR->route = 'modelpaiements.create';
            $ERROR->msg = " Il n'existe aucun model de paiement veuillez dabord enregistrer au moins un model. Le paiement est associe au model";
            $ERROR->btn_msg = 'Creer un model de paiement';
            $ERRORS->add($ERROR);

        }

        return $ERRORS;

    }

    public function verifier1($ETUD)
    {$ERRORS=null;

        if(!$ETUD->insolvable && !$ETUD->moratoire) {
            $ERRORS = new BaseCollection();
            $ERROR = new error();
            $ERROR->route = 'paiements.create';
            $ERROR->msg = " l'etudiant(e) ".$ETUD->name." ".$ETUD->surname." a deja paye la totalite de ses frais donc est solvable  ";
            $ERROR->btn_msg = ' << Precedent';

            $ERRORS->add($ERROR);
            $ERROR = new error();
            $ERROR->route = 'etudiants.create';
            $ERROR->msg = "ajouter un autre etudiant si ".$ETUD->name." ".$ETUD->surname." est l'unique ";
            $ERROR->btn_msg = 'Creer un etudiant';
            $ERRORS->add($ERROR);

        }

        return $ERRORS;

    }
}
