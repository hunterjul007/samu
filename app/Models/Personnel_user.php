<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personnel_user extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'personnel_id',
        'etat_mouvement_personnel',
        'etat_formation_personnel',
        'quantite_personnel',
        'niveau',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
