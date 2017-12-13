<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthEventLog extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auth_event_type_id',
        'ip',
    ];
    
    protected $dates = [
        'created_at',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
