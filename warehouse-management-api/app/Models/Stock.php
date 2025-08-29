<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
      'warehouse_id',
      'product_id',
      'order_id',
      'expiry_date',
      'date_received',
      'date_shipped',
    ];

    public function transfer(): HasOne
    {
        return $this->hasOne(Transfer::class);
    }

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
