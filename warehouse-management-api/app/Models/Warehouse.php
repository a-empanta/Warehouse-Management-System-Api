<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'coordinates',
        'address',
        'city',
        'country',
    ];

    protected $casts = [
        'coordinates' => 'array',
    ];

    public function outgoingTransfers(): HasMany
    {
        return $this->hasMany(Transfer::class, 'initial_warehouse_id');
    }

    public function incomingTransfers(): HasMany
    {
        return $this->hasMany(Transfer::class, 'destination_warehouse_id');
    }

    public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
