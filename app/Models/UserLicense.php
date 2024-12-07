<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLicense extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'license_keys', 'license_settings', 'message', 'status', 'last_prompted'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'license_keys' => 'json',
        'license_settings'  => 'json'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }



}
