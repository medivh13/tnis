<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Transaction extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id','created_by','amount','type','created_at', 'updated_at'
    ];

    public function createdUser()
    {
        // belongsTo(RelatedModel, foreignKey = created_by, keyOnRelatedModel = id)
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
