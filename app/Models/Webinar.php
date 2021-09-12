<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    private $minCountTheme = 5;
    private $maxCountTheme = 10;

    private function searchByThemes($data)
    {
        if (isset($data['themes']) && sizeof($data['themes']))
            return $this->with('themeWebinar')
                ->whereIn('theme_webinar_id', $data['themes']);

        return $this;
    }

    private function searchByMonths($builder, $numbersMonth)
    {
        return $builder->whereIn('number_month', $numbersMonth);
    }

    public function themeWebinar()
    {
        return $this->belongsTo(ThemeWebinar::class, 'theme_webinar_id', 'id');
    }

    public function setNumberMonthAttribute($data)
    {
        $this->attributes['number_month'] = (int)Carbon::parse($data)->format('m');
    }

    public function getInfoWebinars($data)
    {
        if ($this->customValidate($data) === false)
            return false;

        $builder = $this->searchByThemes($data);

        if (isset($data['months']) && sizeof($data['months']))
            $builder = $this->searchByMonths($builder, $data['months']);

        return $builder->get();
    }

    public function customValidate($data)
    {
        if ($data == null or array_key_exists('themes', $data) === false)
            return false;

        if (count($data['themes']) < $this->minCountTheme or count($data['themes']) > $this->maxCountTheme)
            return false;

        return true;
    }
}
