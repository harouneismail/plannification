<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sousdirection extends Model
{
    use HasFactory;
    public function niveauplanification()
    {
        return $this->belongsTo(Niveauplanification::class);
    }
    public function directioncentrale()
    {
        return $this->belongsTo(Directioncentrale::class);
    }
    public function service()
    {
        return $this->hasMany(Service::class);
    }
    public function canneva()
    {
        return $this->hasMany(Canneva::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}
