<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Formation extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'libelle_formation',
        'prix_formation',
        'temps_formation',
        'image_formation',
        'published',
        'recompense_formation',
    ];
    protected function casts(): array
    {
        return [
            'published' => 'boolean',
        ];
    }

    // public function typeUnite()
    // {
    //     return $this->belongsTo(TypeUnite::class);
    // }

    public function personnelFormation()
    {
        return $this->hasMany(Personnel_formation::class);
    }
}
