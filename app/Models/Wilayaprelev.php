<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wilayaprelev extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $date = ['deleted_at'];
    protected $guarded = [];
    public function moughprelev()
    {
        return $this->hasMany(Moughprelev::class);
    }
    public function rapport()
    {
        return $this->hasMany(Rapport::class);
    }
    public function structsanit()
    {
        return $this->hasMany(Structsanit::class);
    }
    public function fichedenotification()
    {
        return $this->hasMany(fichedenotification::class);
    }
}
