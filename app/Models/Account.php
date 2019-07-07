<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Account extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'accounts';

    /**
        * Indicates if the IDs are auto-incrementing.
        *
        * @var bool
        */
        public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','customer_id','balance','created_at', 'updated_at'
    ];

    public function customer()
    {
        // belongsTo(RelatedModel, foreignKey = customer_id, keyOnRelatedModel = id)
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
