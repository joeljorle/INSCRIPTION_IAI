<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unitepaiement extends Model
{
    protected $guarded=[];

    public function VERSEMENT()
    {
        return 0;
    }

    public function NBRE_PAIEMENTS()
    {
        return 0;
    }
}
