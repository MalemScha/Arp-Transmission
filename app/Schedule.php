<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'schedule', 'tower_id', 'month','line_id','sent'
    ];
    public function tower()
    {
        return $this->belongsTo(Tower::class);
    }

    public function line()
    {
        return $this->belongsTo(Line::class);
    }
}
