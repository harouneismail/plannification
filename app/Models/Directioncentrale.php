<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directioncentrale extends Model
{
    use HasFactory;
    public function niveauplanification()
    {
        return $this->belongsTo(Niveauplanification::class);
    }
    public function sousdirection()
    {
        return $this->belongsTo(Sousdirection::class);
    }
    public function service()
    {
        return $this->hasMany(Service::class);
    }
    public function canneva()
    {
        return $this->hasMany(Canneva::class);
    }
    public function resultatcomposante()
    {
        return $this->hasMany(Resultatcomposante::class);
    }
    public function appui()
    {
        return $this->hasMany(Appui::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}
