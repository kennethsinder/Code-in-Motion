<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string image_dir
 */
class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = ['name', 'excerpt', 'description', 'github', 'date_created', 'important', 'image_dir'];
    protected $dates = ['date_created'];

    public function setCreatedAtAttribute($date)
    {
        $this->attributes['date_created'] = Carbon::parse($date);
    }

    public function getDateCreatedAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }
}
