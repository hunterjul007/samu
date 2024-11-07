<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MissionUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mission_id',
        'position_x',
        'position_y',
        'etat',
        'icon',
        'is_completed'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
}
