<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeWebinar extends Model
{
    use HasFactory;

    protected $table = 'theme_webinars';

    public function webinars()
    {
        return $this->hasMany(Webinar::class);
    }

}
