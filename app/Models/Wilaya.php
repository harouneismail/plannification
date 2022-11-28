<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wilaya extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $date = ['deleted_at'];
    protected $guarded = [];

    public function mough()
    {
        return $this->hasMany(Mough::class);
    }
    public function rapport()
    {
        return $this->hasMany(Rapport::class);
    }
    public function structsanit()
    {
        return $this->hasMany(Structsanit::class);
    }
    public function actif()
    {
        return $this->hasMany(Actif::class);
    }
    public function fichedenotification()
    {
        return $this->hasMany(fichedenotification::class);
    }
    public function nombredefosa()
    {
        return $this->hasMany(Nombredefosa::class);
    }
    public function directeurregional(){
        return $this->hasOne(Directeurregional::class);
    }
}
