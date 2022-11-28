<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeactivite extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function canneva(){
        return $this->hasMany(Canneva::class);
    }
}
