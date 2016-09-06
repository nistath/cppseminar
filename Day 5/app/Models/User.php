<?php

namespace App\Models;

use DB;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'fullname'
     ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the takeaways for this user.
     */
    public function actions()
    {
        return $this->hasMany('App\Models\Action');
    }


    /**
     * Get data for this user.
     */
    public function data($key)
    {
        $data = DB::table('user_info')->where('user_id', $this->id)->where('key', $key)->first();
        if ($data == null) return null;
        return $data->value;
    }

    /**
     * Set data for this user.
     */
    public function setData($key, $value)
    {
        if ($this->data($key) == null) {
            return DB::table('user_info')->insert([
                'user_id' => $this->id,
                'key' => $key,
                'value' => $value
            ]);
        } else {
            return DB::table('user_info')
                ->where('user_id', $this->id)
                ->where('key', $key)
                ->update(['value' => $value]);
        }
    }
}
