<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composante extends Model
{
    use HasFactory;
    public function axe()
    {
        return $this->belongsTo(Axe::class);
    }
    public function souscomposante()
    {
        return $this->hasMany(Souscomposante::class);
    }
    public function actionintervention()
    {
        return $this->hasMany(Actionintervention::class);
    }
    public function canneva()
    {
        return $this->hasMany(Canneva::class);
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
