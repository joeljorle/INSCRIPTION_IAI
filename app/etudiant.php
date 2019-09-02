<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{

    protected $guarded = [];

    public function VERSEMENT()
    {
        return 0;
    }

    public function VERSEMENT_RESTE()
    {
        $reste=$this->FILIERE()->PENSION_TOTAL()-$this->VERSEMENT_TOTAL();
        if($reste<=0) $reste=0;
        return $reste;
    }

    public function VERSEMENT_EVOLUTION()
    {
        return 0;
    }

    public function MORATOIRE()
    {
        return moratoire::whereIdetudiant($this->id)->get()->first();
    }

    public function CLASSE()
    {
        return classes::find($this->idclasse);
    }

    public function PAIEMENT()
    {
        return paiement::whereIdetudiant($this->id)->get();
    }

    public function FILIERE()
    {
        return $this->CLASSE()->FILIERE();
    }

    public function VERSEMENT_TOTAL()
    {
        $vers = 0;
        foreach (paiement::whereIdetudiant($this->id)->get() as $paie)
            $vers = $paie->montant;
        return $vers;
    }











}
