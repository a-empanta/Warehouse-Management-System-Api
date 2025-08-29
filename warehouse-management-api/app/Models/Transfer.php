<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
      'stock_id',
      'initial_warehouse_id',
      'destination_warehouse_id',
      'status'
    ];

    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }

    public function initialWarehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class, 'initial_warehouse_id');
    }

    public function destinationWarehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class, 'destination_warehouse_id');
    }
}
