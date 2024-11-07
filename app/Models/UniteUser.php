<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniteUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vitesse',
        'nom',
        'places_disponible',
        'etat_mouvement_unite',
        'etat_unite',
        'taux_usure',
        'quantity',
        'sante',
        'icon',
        'capacites',
        'unite_id',
        'user_id'
    ];

    protected $cast=['capacites'=>'array'];
    
    public function demandeUnite()
    {
        return $this->hasMany(DemandeUnite::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function unite()
    {
        return $this->belongsTo(Unite::class);
    }
}
