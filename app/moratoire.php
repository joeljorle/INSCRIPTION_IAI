<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class moratoire extends Model
{
    protected $guarded=[];

    public function ETUDIANT()
    {
        return etudiant::find($this->idetudiant);
    }

    public function MONTANT()
    {$montant=0;
        if ($this->idunite!=0)
        return modelpaiement::whereIduniteAndIdfiliere($this->idunite,$this->ETUDIANT()->CLASSE()->idfiliere)->get()->first()->montant;
        else{
            foreach ( modelpaiement::whereIdfiliere($this->ETUDIANT()->CLASSE()->idfiliere)->get() as $mod)
            $montant+=$mod->montant;
            if (!empty($montant)) {
                return $montant;
            }
        }

    }

    public function UNITE()
    {
        return unitepaiement::find($this->idunite);
    }
    public  function NBRE_PAIEMENTS()
    {
        return 0;
    }

}
