<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Collection;

class filieres extends Model
{

/*
**
* The attributes that are mass assignable.
*
* @var array
*/
    protected $guarded = [];

public  function VERSEMENT_NUMBER()
{
    return 0;
}

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
        return  null;
    }

    public  function MORATOIRE()
    {
        return null;
    }

    public  function CLASSES()
    {
        return classes::whereIdfiliere($this->id)->get()->count();
    }

    public  function SOLVABLE_CLASSE()
    {
        return null;
    }

    public  function INSOLVABLE_CLASSE()
    {
        return null;
    }

    public function REVENU()
    {
        $rev=0;$etud=0;

        foreach (classes::whereIdfiliere($this->id)->get() as $classes)
         $etud+=count(etudiant::whereIdclasse($classes->id)->get());

         $rev=$this->PENSION_TOTAL()*$etud;

        return $rev;
    }

    public function PENSION_TOTAL()
    {$montant=0;
        foreach (modelpaiement::whereIdfiliere($this->id)->get() as $mod)
        $montant+=$mod->montant;
        return $montant;
    }



}
