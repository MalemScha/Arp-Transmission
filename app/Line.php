<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class Line extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', '', 'start_location_id', 'end_location_id', 'line_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function towers()  //one to many
    {
        return $this->hasMany(Tower::class);
    }
    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
