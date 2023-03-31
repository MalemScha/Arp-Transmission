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
        'name', 'user_id', 'start_location_id', 'end_location_id', 'line_id','voltage','circuit','length','conductor','tower_no'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function slocation()
    {
        return $this->belongsTo(Location::class, 'start_location_id');
    }
    public function elocation()
    {
        return $this->belongsTo(Location::class, 'end_location_id');
    }
    public function towers()  //one to many
    {
        return $this->hasMany(Tower::class);
    }
    public function reports()  //one to many
    {
        return $this->hasMany(Report::class);
    }
    public function location()
    {
        return $this->hasOne(Location::class);
    }
}
