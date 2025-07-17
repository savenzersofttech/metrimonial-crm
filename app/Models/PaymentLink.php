<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'plan',
        'price',
        'discount',
        'final_amount',
        'payment_link',
        'status',
    ];

    // Relationship to profile (prospect)
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
