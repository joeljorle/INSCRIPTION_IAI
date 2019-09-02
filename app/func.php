<?php
namespace App;

use Illuminate\Support\Collection as BaseCollection;
use Illuminate\Support\Facades\Hash;

class func
{
    public static function random($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    public static function check()
    {
        if(count(User::all())==0)
        {
            User::create([
                'name' => 'messu',
                'slug' => func::random(15),
                'surname' => 'messu',
                'email' => 'messu@gmail.com',
                'phone'=>'691568415',
                'password' => Hash::make('messu123'),
            ]);
        }
    }

    public static function COUT_MORATS()
    {$montant=0;

    foreach (moratoire::all() as $morat)
        $montant+=$morat->MONTANT();
        return $montant;
    }

    public static function COUT_PENAL()
    {$montant=0;

    foreach ( etudiant::all() as $etud)
        $montant+=$etud->penalite;
        return $montant;
    }

    public static function PAIEMENTS()
    {$montant=0;

        foreach ( paiement::all() as $etud)
            $montant+=$etud->montant;
        return $montant;
    }

    public static function PAIEMENTS_RESTE()
    {$revenus=0;

        foreach ( filieres::all() as $etud)
         $revenus+=$etud->REVENU();
        return $revenus-(self::PAIEMENTS());;
    }



    public static function REPARTIR($ETUDIANT,$VERSEMENT)
    {
        $repartion=['name'=>null,'montant'=>0];
        $REPARTIONS = new BaseCollection();
        if($VERSEMENT>=$ETUDIANT->FILIERE()->PENSION_TOTAL())
            foreach (modelpaiement::whereIdfiliere($ETUDIANT->FILIERE()->id)->get() as $model)
            {
                $repartion['name']=$model->UNITE()->name; $repartion['montant']=$model->montant;
                $REPARTIONS->add($repartion);
            }
        else
        foreach (modelpaiement::whereIdfiliere($ETUDIANT->FILIERE()->id)->get() as $model)
        {
            if($VERSEMENT<$model->montant) {

                $repartion['name'] = $model->UNITE()->name;
                $repartion['montant'] = $VERSEMENT;
                $REPARTIONS->add($repartion);
                break;
            }
            else if($VERSEMENT>$model->montant){

             $repartion->name=$model->UNITE()->name;
             $repartion->montant=$model->montant;
             $VERSEMENT-=$model->montant;
             $REPARTIONS->add($repartion);
            }
            else{

                $repartion->name=$model->UNITE()->name;
                $repartion->montant=$model->montant;
                $REPARTIONS->add($repartion);
                break;
            }



        }
       return $REPARTIONS;

    }

    protected static function ronge($PP,$PG)
    {
        if($PG==$PP) return $PG;
        elseif ($PG<$PP) return $PP-$PG;
        else return $PG-$PP;
    }

}
