<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'longitude', 'latitude'
    ];
    public function tower()
    {
        return $this->belongsTo(Tower::class);
    }
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
    public function line()
    {
        return $this->belongsTo(line::class);
    }
}
