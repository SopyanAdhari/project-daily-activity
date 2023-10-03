<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentee extends Model
{
    use HasFactory;

    protected $table = 'mentee';

    protected $fillable = [
        'mentor_id',
        'user_id',
    ];


    
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
