<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coordinates',
        'address',
        'city',
        'country',
        'phone',
    ];

    protected $casts = [
      'coordinates' => 'array',
    ];

    public function orders(): HasMany
    {
      return $this->hasMany(Order::class);
    }

    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }
}
