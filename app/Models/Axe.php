<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Axe extends Model
{
    use HasFactory;
    public function composante()
    {
        return $this->hasMany(Composante::class);
    }
    public function souscomposante()
    {
        return $this->hasMany(Souscomposante::class);
    }
    public function actionintervention()
    {
        return $this->hasMany(Actionintervention::class);
    }
    public function interventioncle()
    {
        return $this->hasMany(Interventioncle::class);
    }
    public function resultatcomposante()
    {
        return $this->hasMany(Resultatcomposante::class);
    }
    public function resultatproce()
    {
        return $this->hasMany(Resultatproce::class);
    }
    public function resultatattendu()
    {
        return $this->hasMany(Resultatattendu::class);
    }

}
