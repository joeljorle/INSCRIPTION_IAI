<?php

namespace App\Http\Controllers;

use App\classes;
use App\error;
use App\etudiant;
use App\func;
use App\unitepaiement;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as BaseCollection;

class EtudiantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $ETUDS=etudiant::all();
        $CLASS=classes::all();
        return view('gestionetudiant',compact('ETUDS','CLASS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ETUD=null;
        $CLASS=classes::all();
        $ERRORS=$this->verifier($CLASS);
        if($ERRORS==null) return view('ajoutetudiant',compact('ETUD','CLASS'));
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
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],

            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        etudiant::create([
            'slug' => func::random(15),
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'description' => $request->description,
            'residence' => $request->residence,
            'phone'=>$request->phone,
            'idclasse'=>$request->classe,
            'description' => $request->description,
        ]);


        return redirect()->route('etudiants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show($etudiant)
    {
        $ETUD=etudiant::find($etudiant);

        return view('profiletudiant',compact('ETUD'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit($etudiant)
    {

        $ETUD=etudiant::find($etudiant);
        $CLASS=classes::all();
        return view('ajoutetudiant',compact('ETUD','CLASS'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$etudiant)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:etudiants,email,$etudiant,id"],

            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $ETUD=etudiant::find($etudiant);
        $ETUD->name=$request->name;
        $ETUD->surname=$request->surname;
        $ETUD->email=$request->email;
        $ETUD->phone=$request->phone;
        $ETUD->residence=$request->residence;
        $ETUD->idclasse=$request->classe;
        $ETUD->description=$request->description;

        $ETUD->save();
        return redirect()->route('etudiants.show',[$ETUD]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy($etudiant)
    {

        $ETUD=etudiant::find($etudiant);
        $ETUD->delete();
        return redirect()->route('etudiants.index');
    }


    /**
     * Search  resource from storage.
     *
     * @param  \App\etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $ETUDS=etudiant::all();
        $CLASS=classes::all();
        return view('gestionetudiant',compact('ETUDS','CLASS'));
    }

    public function erase($etudiant)
    {   $ETUD=etudiant::find($etudiant);
        $ETUD->montantpenalite=0;
        $ETUD->save;
        return view('profiletudiant',compact('ETUD'));
    }

    public function verifier($CLASS)
    {$ERRORS=null;

        if(count($CLASS)==0) {
            $ERRORS = new BaseCollection();
            $ERROR = new error();
            $ERROR->route = 'classes.create';
            $ERROR->msg = " Il n'existe aucune classe veuillez dabord enregistrer au moins une classe. L'etudiant doit etre affecter a une classe";
            $ERROR->btn_msg = 'Creer une classe';
            $ERRORS->add($ERROR);
        }


     return $ERRORS;

    }
}
