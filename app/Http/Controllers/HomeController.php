<?php

namespace App\Http\Controllers;

use App\classes;
use App\etudiant;
use App\filieres;
use App\func;
use App\modelpaiement;
use App\moratoire;
use App\paiementdistance;
use App\penalite;
use App\unitepaiement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usr=Auth::user();
        $usr->online=true;
        $usr->save();
        $FILS=filieres::all();
        $ETUDS=etudiant::all();
        $CLASS=classes::all();
        $ADMINS=User::all();
        $MORATS=moratoire::all();
        $PENALS=penalite::all();
        $UNITS=unitepaiement::all();
        $PDISTS=paiementdistance::all();
        $MODELS=modelpaiement::all();
        $SOLVABLES=etudiant::whereInsolvable(false)->get();
        $INSOLVABLES=etudiant::whereInsolvable(true)->get();
        $MORATOIRES=etudiant::whereMoratoire(true)->get();
        $REVENUS=func::PAIEMENTS();
        $RESTE=func::PAIEMENTS_RESTE();







        return view('home',compact('RESTE','REVENUS','MORATOIRES','INSOLVABLES','SOLVABLES','MODELS','PDISTS','UNITS','PENALS','MORATS','CLASS','ETUDS','ADMINS','FILS'));
    }


}
