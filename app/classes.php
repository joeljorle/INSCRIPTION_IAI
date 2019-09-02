<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    protected $guarded=[];
    public  function EFFECTIF()
    {
        return 0;
    }

    public  function SOLVABLE_NUMBER()
    {
        return 0;
    }

    public  function INSOLVABLE_NUMBER()
    {
        return 0;
    }

    public  function VERSEMENT()
    {
        return 0;
    }

    public  function VERSEMENT_RESTE_NUMBER()
    {
        return 0;
    }


    public  function PENALITE_NUMBER()
    {
        return 0;
    }

    public  function VERSEMENT_QTY()
    {
        return 0;
    }

    public  function MORATOIRE_NUMBER()
    {
        return 0;
    }

    public  function PENALITE()
    {
        return null;
    }

    public  function MORATOIRE()
    {
        return null;
    }

    public  function FILIERE()
    {
        return filieres::find($this->idfiliere);
    }

    public  function ETUDIANTS()
    {
        return etudiant::whereIdclasse($this->id);
    }

    public  function SOLVABLE_ETUDIANTS()
    {
        return null;
    }

    public  function INSOLVABLE_ETUDIANTS()
    {
        return null;
    }

}
