<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class bouquet
 * @package App\Models
 * @version April 26, 2025, 6:45 pm UTC
 *
 * @property \App\Models\Product $productid
 * @property \Illuminate\Database\Eloquent\Collection $orders
 * @property integer $productid
 * @property string $flowertype
 * @property string $size
 */
class bouquet extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'bouquet';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'productid',
        'flowertype',
        'size'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'productid' => 'integer',
        'flowertype' => 'string',
        'size' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'productid' => 'nullable|integer',
        'flowertype' => 'nullable|string|max:50',
        'size' => 'nullable|string|max:20'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productid()
    {
        return $this->belongsTo(\App\Models\Product::class, 'productid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'bouquetid');
    }
}
