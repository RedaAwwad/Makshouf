<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalityQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['scale_id', 'question', 'order'];

    public function scale()
    {
        return $this->belongsTo(PersonalityScale::class, 'scale_id');
    }
}
