<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

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
        'id','nik','email','first_name','last_name','created_at', 'updated_at'
    ];
}
