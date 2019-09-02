<?php

namespace App\Http\Controllers;

use App\classes;
use App\error;
use App\filieres;
use App\func;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as BaseCollection;

class ClassesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CLASS=classes::all();
        $FILS=filieres::all();
        return view('gestionclasse',compact('CLASS','FILS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CLAS=null;$FILS=filieres::all();
        $ERRORS=$this->verifier($FILS);
        if($ERRORS==null) return view('ajoutclasse',compact('CLAS','FILS'));
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

        classes::create([
            'name' => $request->name,
            'slug' => func::random(15),
            'idfiliere'=>$request->filiere,
            'description' => $request->description,
        ]);


        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show($classes)
    {

        $CLAS=classes::find($classes);
        return view('profilclasse',compact('CLAS'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit($classes)
    {

        $CLAS=classes::find($classes);
        return view('ajoutclasse',compact('CLAS'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$classes)
    {

        $CLAS=classes::find($classes);
        $CLAS->name=$request->name;
        $CLAS->filiere=$request->filiere;
        $CLAS->description=$request->description;
        $CLAS->save();
        return redirect()->route('classes.show',[$CLAS]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy($classes)
    {

        $CLAS=classes::find($classes);
        $CLAS->delete();
        return redirect()->route('classes.index');
    }

    public function verifier($FILS)
    {$ERRORS=null;

       if(count($FILS)==0) {
           $ERRORS = new BaseCollection();
           $ERROR = new error();
           $ERROR->route = 'filieres.create';
           $ERROR->msg = " Il n'existe aucune filiere veuillez dabord enregistrer au moins une filiere. La classe doit etre affecter a la filiere";
           $ERROR->btn_msg = 'Creer une filiere';
           $ERRORS->add($ERROR);


       }

       return $ERRORS;

    }
}
