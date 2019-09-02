<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection as BaseCollection;



class paiement extends Model
{


    protected $guarded=[];

    function ETUDIANT()
    {
        return etudiant::find($this->idetudiant);
    }

    function UNITE()
    {
        return unitepaiement::find($this->idunite);
    }

    function MODEL()
    {
        return modelpaiement::whereIdfiliereAndIdunite($this->ETUDIANT()->CLASSE()->idfiliere,$this->idunite)->get()->first();
    }

    /**
     *
     */
    function REPARTION()
    { $REPARTIONS = new BaseCollection();




    }


    function MODE_PAIEMENT()
    {
        if($this->mode!=0)
        return paiementdistance::find($this.mode)->get()->first()->name;
        else return 'local';
    }



}


