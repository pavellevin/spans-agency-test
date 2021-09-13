<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    public function themeWebinar()
    {
        return $this->belongsTo(ThemeWebinar::class, 'theme_webinar_id', 'id');
    }

    public function setNumberMonthAttribute($data)
    {
        $this->attributes['number_month'] = (int)Carbon::parse($data)->format('m');
    }

}
