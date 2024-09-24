<?php


namespace Beike\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rma extends Base
{
    use HasFactory;

    protected $fillable = ['order_id', 'order_product_id', 'customer_id', 'name', 'email', 'telephone', 'product_name', 'sku', 'quantity', 'opened', 'rma_reason_id', 'type', 'status', 'comment'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function orderProduct(): BelongsTo
    {
        return $this->belongsTo(OrderProduct::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function reason(): BelongsTo
    {
        return $this->belongsTo(RmaReason::class, 'rma_reason_id', 'id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(RmaHistory::class);
    }

    public function getTypeFormatAttribute(): mixed
    {
        return trans("rma.type_{$this->type}");
    }

    public function getStatusFormatAttribute(): mixed
    {
        return trans("rma.status_{$this->status}");
    }
}
