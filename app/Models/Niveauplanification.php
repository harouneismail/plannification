<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveauplanification extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function directioncentrale()
    {
        return $this->hasMany(Directioncentrale::class);
    }
    public function sousdirection()
    {
        return $this->hasMany(Sousdirection::class);
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
