<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appui extends Model
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
    public function user(){
        return $this->belongsTo(User::class);
    }
}
