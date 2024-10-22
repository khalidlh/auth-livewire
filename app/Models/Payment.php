<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'user_id',
        'amount',
        'currency',
        'status',
    ];

    // Optionnel : Si tu as une relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
