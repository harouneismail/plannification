<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structsanit extends Model
{
    use HasFactory;
    protected $date = ['deleted_at'];
    public function wilayaprelev()
    {
        return $this->belongsTo(Wilayaprelev::class);
    }
    public function moughprelev()
    {
        return $this->belongsTo(Moughprelev::class);
    }
    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }
    public function mough()
    {
        return $this->belongsTo(Mough::class);
    }
    public function rapport()
    {
        return $this->hasMany(Rapport::class);
    }
    public function fichedenotification()
    {
        return $this->hasMany(fichedenotification::class);
    }
}
