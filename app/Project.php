<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = ['name', 'excerpt', 'description', 'github', 'date_created'];
    protected $dates = ['date_created'];

    public function setCreatedAtAttribute($date)
    {
        $this->attributes['date_created'] = Carbon::parse($date);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }
}
