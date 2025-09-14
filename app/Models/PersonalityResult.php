<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalityResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'test_id', 'answers', 'diagnosis'];

    protected $casts = [
        'answers' => 'array',
        'diagnosis' => 'array',
    ];

    public function test()
    {
        return $this->belongsTo(PersonalityTest::class, 'test_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

