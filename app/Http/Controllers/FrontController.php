<?php

namespace App\Http\Controllers;

use App\Models\ThemeWebinar;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public $months = [
        '1' => 'January',
        '2' => 'February',
        '3' => 'March',
        '4' => 'April',
        '5' => 'May',
        '6' => 'June',
        '7' => 'July',
        '8' => 'August',
        '9' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December',
    ];

    public function index(){
        $themes = ThemeWebinar::all();
        return view('welcome', ['months' => $this->months, 'themes' => $themes]);
    }
}
