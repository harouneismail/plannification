<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canneva extends Model
{
    use HasFactory;
    public function axe()
    {
        return $this->belongsTo(Axe::class);
    }
    public function composante()
    {
        return $this->belongsTo(Composante::class);
    }
    public function souscomposante()
    {
        return $this->belongsTo(Souscomposante::class);
    }
    public function actionintervention()
    {
        return $this->belongsTo(Actionintervention::class);
    }
    public function niveauplanification()
    {
        return $this->belongsTo(Niveauplanification::class);
    }
    public function directioncentrale()
    {
        return $this->belongsTo(Directioncentrale::class);
    }
    public function sousdirection()
    {
        return $this->belongsTo(Sousdirection::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function interventioncle()
    {
        return $this->belongsTo(Interventioncle::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function typeactivite(){
        return $this->belongsTo(Typeactivite::class);
    }
    public function sourcefinancement(){
        return $this->belongsTo(Sourcefinancement::class);
    }
    public function annee(){
        return $this->belongsTo(Annee::class);
    }
    
}
