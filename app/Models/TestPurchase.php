<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestPurchase extends Model
{
    protected $fillable = [
        'user_id',
        'test_id',
        'amount_cents',
        'currency',
        'stripe_session_id',
        'stripe_payment_intent_id',
        'status',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function test()
    {
        return $this->belongsTo(PersonalityTest::class, 'test_id');
    }
}
