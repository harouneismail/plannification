<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultatproce extends Model
{
    use HasFactory;
    protected $guarded=[];
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
}
