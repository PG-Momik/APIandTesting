<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $table      = "products";
    protected $primaryKey = "id";

    /**
     * Returns an object of User.
     *
     * @return BelongsTo
     */
    public function registrant(): belongsTo
    {
        return $this->belongsTo(User::class, 'registered_by', 'id');
    }

    /**
     * Returns an object of Category.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withTrashed()->select('id', 'name');
    }

    /**
     * @return HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'product_id', 'id');
    }

}
