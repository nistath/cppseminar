<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'user_id', 'hub_id', 'quantity_meals', 'quantity_bottles'
    ];

    /**
     * Get the hub associated with this takeaway.
     */
    public function hub()
    {
        return $this->hasOne('App\Model\Hub');
    }

    /**
     * Get the user associated with this takeaway.
     */
    public function user()
    {
        return $this->hasOne('App\Model\User');
    }
}
