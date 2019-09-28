<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function get(Request $request){
        $news = DB::table('news')->get()->where('city', $request->city);

        return json_encode($news, JSON_UNESCAPED_UNICODE);
    }

    public function getAll(){
        $cities = DB::table('news')->get('city')->groupBy('city');

        return $cities;
    }
}
