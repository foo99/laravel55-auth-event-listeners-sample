<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $appends = [
        'last_login_at',
        'last_login_ip',
    ];
    
    /**
     * Get the auth event logs
     */
    public function authEventLogs()
    {
        return $this->hasMany('App\AuthEventLog');
    }
    
    public function getLastLoginAtAttribute()
    {
        $log = $this->authEventLogs()->latest()->first();
        
        return $log->created_at;
    }
    
    public function getLastLoginIpAttribute()
    {
        $log = $this->authEventLogs()->latest()->first();
        
        return $log->ip;
    }
}
