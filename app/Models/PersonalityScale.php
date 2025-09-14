<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalityScale extends Model
{
    use HasFactory;

    protected $fillable = ['test_id', 'name', 'threshold'];

    public function test()
    {
        return $this->belongsTo(PersonalityTest::class, 'test_id');
    }

    public function questions()
    {
        return $this->hasMany(PersonalityQuestion::class, 'scale_id')->orderBy('order');
    }
}

