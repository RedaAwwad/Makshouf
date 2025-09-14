<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'image',
        'email',
        'mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function personalityResults()
    {
        return $this->hasMany(PersonalityResult::class);
    }

    public function testPurchases()
    {
        return $this->hasMany(TestPurchase::class);
    }

    public function getAvatarUrlAttribute(): string
    {
        // Case 1: user uploaded image (stored locally)
        if ($this->image && !filter_var($this->image, FILTER_VALIDATE_URL)) {
            return asset('storage/' . $this->image);
        }

        // Case 2: social provider avatar (URL saved in DB)
        if ($this->image && filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        // Case 3: fallback default avatar
        return asset('images/frontend/testimonial-avatar.webp');
    }
}
