<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 * @package App\Models
 * @version April 26, 2025, 6:46 pm UTC
 *
 * @property \App\Models\Customer $customerid
 * @property \App\Models\Bouquet $bouquetid
 * @property string $orderdate
 * @property time $deliverytime
 * @property integer $customerid
 * @property integer $bouquetid
 * @property integer $quantity
 * @property number $total
 */
class Order extends Model // Use uppercase "Order"
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'orders';  // Table name remains in lowercase

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'orderdate',
        'deliverytime',
        'customerid',
        'bouquetid',
        'quantity',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'orderdate' => 'date',
        'customerid' => 'integer',
        'bouquetid' => 'integer',
        'quantity' => 'integer',
        'total' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'orderdate' => 'nullable',
        'deliverytime' => 'nullable',
        'customerid' => 'nullable|integer',
        'bouquetid' => 'nullable|integer',
        'quantity' => 'nullable|integer',
        'total' => 'nullable|numeric'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function customerid()
    {
        return $this->belongsTo(\App\Models\Customer::class, 'customerid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bouquetid()
    {
        return $this->belongsTo(\App\Models\Bouquet::class, 'bouquetid');
    }
}
