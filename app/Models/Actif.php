<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Actif extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $date=['deleted_at'];
    public function wilaya(){
        return $this->belongsTo(Wilaya::class);
    }
}
