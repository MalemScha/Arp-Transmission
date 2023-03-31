<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class Tower extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'location_id', 'line_id', 'tower_id','type','tension'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function line()
    {
        return $this->belongsTo(Line::class);
    }
    public function reports()  //one to many
    {
        return $this->hasMany(Report::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
