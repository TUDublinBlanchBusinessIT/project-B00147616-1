<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class product
 * @package App\Models
 * @version April 26, 2025, 7:46 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bouquets
 * @property string $name
 * @property string $description
 * @property number $price
 * @property integer $stock
 * @property string $imagepath
 */
class product extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'product';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'imagepath'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'price' => 'decimal:2',
        'stock' => 'integer',
        'imagepath' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable|string|max:100',
        'description' => 'nullable|string',
        'price' => 'nullable|numeric',
        'stock' => 'nullable|integer',
        'imagepath' => 'nullable|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bouquets()
    {
        return $this->hasMany(\App\Models\Bouquet::class, 'productid');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}