<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personnel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titre_personnel',
        'description_personnel',
        'prix_personnel',
        'image',
        'published',
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
    public function personnelUser()
    {
        return $this->hasMany(Personnel_user::class);
    }
    public function personnelFormation()
    {
        return $this->hasMany(Personnel_formation::class);
    }
}
