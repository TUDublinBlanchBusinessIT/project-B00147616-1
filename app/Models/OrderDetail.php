<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // Specify the table if it's different from the plural form
    protected $table = 'order_detail';  // Make sure this matches your table name
    
    public $incrementing = false;         // No auto-increment
    protected $primaryKey = null;         // Laravel doesn't support composite PKs natively
    public $timestamps = false; 


    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Define the relationship with the Order model
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}