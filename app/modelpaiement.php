<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelpaiement extends Model
{
    protected $guarded=[];

    public  function  FILIERE()
    {
        return filieres::find($this->idfiliere);
    }

    public  function  UNITE()
    {
        return unitepaiement::find($this->idunite);
    }
}
