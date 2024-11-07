<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasProfilePhoto, SoftDeletes;


    protected $fillable = [
        'pseudo',
        'nom',
        'prenom',
        'niveau',
        'experience',
        'profile',
        'argent',
        'performance',
        'isblocked',
        'email',
        'password',
        'online',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'online' => 'boolean'
        ];
    }
    public function demandeUnite()
    {
        return $this->hasMany(DemandeUnite::class);
    }
    public function chatMessage()
    {
        return $this->hasMany(ChatMessage::class);
    }
    public function missionUser()
    {
        return $this->hasMany(MissionUser::class);
    }
    public function eventUser()
    {
        return $this->hasMany(EventUser::class);
    }
    public function uniteUser()
    {
        return $this->hasMany(UniteUser::class);
    }
    public function clanUser()
    {
        return $this->hasMany(ClanUser::class);
    }
    public function baseUser()
    {
        return $this->hasMany(BaseUser::class);
    }
    
    public function clan()
    {
        return $this->belongsTo(Clan::class);
    }



}
