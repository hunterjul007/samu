<?php

namespace App\Models;

// use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Personnel_formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_user_id',
        'date_fin_formation',
        'formation_id',
        'next_formation'
    ];
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
    public function personnel()
    {
        return $this->belongsTo(Personnel_user::class);
    }
}
