<?php

namespace App\Models;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'niveauplanification_id',
        'directioncentrale_id',
        'sousdirection_id',
        'service_id',
        'niveau',
        'is_admin',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function niveauplanification()
    {
        return $this->belongsTo(Niveauplanification::class);
    }
    public function directioncentrale()
    {
        return $this->belongsTo(Directioncentrale::class);
    }
    public function sousdirection()
    {
        return $this->belongsTo(Sousdirection::class);
    }
   
    public function canneva(){
        return $this->hasOne(Canneva::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function appui(){
        return $this->belongsTo(Appui::class);
    }
}
