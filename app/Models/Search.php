<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;

    private $minCountTheme = 5;
    private $maxCountTheme = 10;
    private $webinar;

    private function searchByThemes($data)
    {
        if (isset($data['themes']) && sizeof($data['themes']))
            return $this->webinar->with('themeWebinar')
                ->whereIn('theme_webinar_id', $data['themes']);

        return $this;
    }

    private function searchByMonths($builder, $numbersMonth)
    {
        return $builder->whereIn('number_month', $numbersMonth);
    }

    public function __construct(Webinar $webinar)
    {
        $this->webinar = $webinar;
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
