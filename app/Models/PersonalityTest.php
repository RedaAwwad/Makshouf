<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalityTest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'instructions'];

    public function scales()
    {
        return $this->hasMany(PersonalityScale::class, 'test_id')->orderBy('order');
    }

    public function results()
    {
        return $this->hasMany(PersonalityResult::class, 'test_id');
    }

    public function purchases()
    {
        return $this->hasMany(TestPurchase::class, 'test_id');
    }

}

