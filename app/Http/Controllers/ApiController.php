<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getWebinars(Request $request, Webinar $webinar){

        return view('results', ['results' => $webinar->getInfoWebinars($request->data)]);
    }
}
