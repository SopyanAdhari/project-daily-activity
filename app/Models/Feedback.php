<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'comment',
        'mentor_id',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function mentor()
    {
        return $this->belongsTo(User::class);
    }
}
