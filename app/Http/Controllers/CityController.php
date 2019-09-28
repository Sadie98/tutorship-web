<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getAll(){
        $cities = DB::table('cities')->get();

        return $cities;
    }
}
