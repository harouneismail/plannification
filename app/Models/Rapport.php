<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rapport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $date=['deleted_at'];
    protected $guarded=[];
    public function wilaya(){
        return $this->belongsTo(Wilaya::class);
    }

    public function mough(){
        return $this->belongsTo(Mough::class);
    }
    public function structsanit(){
        return $this->belongsTo(Structsanit::class);
    }

   
}
