<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;

    protected $table      = "transactions";
    protected $primaryKey = "id";
    public const TYPE = array(
        'purchase' => 'Purchase',
        'sales'    => 'Sale'
    );


    /**
     * Returns user who made the transaction.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Returns product detail of the transaction.
     *
     * @return HasOne
     */
    public function product(): hasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
