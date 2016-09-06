<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'latitude', 'longitude', 'capacity_meals', 'capacity_drinks','active', 'battery', 'lockdown', 'deployed_at'
    ];

    protected $dates = ['created_at', 'updated_at', 'deployed_at'];

    /**
     * Get the takeaways for this hub.
     */
    public function actions()
    {
        return $this->hasMany('App\Models\Action');
    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'key'       => 'string',
        'latitude'  => 'double',
        'longitude' => 'double',
        'capacity_meals'  => 'integer',
        'capacity_drinks'  => 'integer',
        'active'    => 'boolean',
        'battery'   => 'integer',
        'lockdown'  => 'boolean'
    ];

    /**
     * Get the log for this hub.
     */
    public function log()
    {
        return $this->actions()->orderBy('created_at', 'desc')->limit(50)->get();
    }

    /**
     * Get data for this hub.
     */
    public function data($key)
    {
        $data = DB::table('hub_info')->where('hub_id', $this->id)->where('key', $key)->first();
        if ($data == null) return null;
        return $data->value;
    }

    /**
     * Set data for this hub.
     */
    public function setData($key, $value)
    {
        if ($this->data($key) == null) {
            return DB::table('hub_info')->insert([
                'hub_id' => $this->id,
                'key' => $key,
                'value' => $value
            ]);
        } else {
            return DB::table('hub_info')
                ->where('hub_id', $this->id)
                ->where('key', $key)
                ->update(['value' => $value]);
        }
    }
}
