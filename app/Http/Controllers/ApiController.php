<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getWebinars(Request $request, Search $search){

        return view('results', ['results' => $search->getInfoWebinars($request->data)]);
    }
}
