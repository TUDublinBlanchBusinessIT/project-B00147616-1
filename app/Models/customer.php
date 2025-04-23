<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class customer
 * @package App\Models
 * @version April 18, 2025, 9:03 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $orders
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string|\Carbon\Carbon $createdat
 * @property string|\Carbon\Carbon $updatedat
 * @property string|\Carbon\Carbon $deletedat
 */
class customer extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'customer';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'createdat',
        'updatedat',
        'deletedat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'firstname' => 'string',
        'lastname' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'password' => 'string',
        'createdat' => 'datetime',
        'updatedat' => 'datetime',
        'deletedat' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstname' => 'nullable|string|max:30',
        'lastname' => 'nullable|string|max:30',
        'email' => 'nullable|string|max:50',
        'phone' => 'nullable|string|max:20',
        'password' => 'nullable|string|max:255',
        'createdat' => 'nullable',
        'updatedat' => 'nullable',
        'deletedat' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'customerid');
    }
}
