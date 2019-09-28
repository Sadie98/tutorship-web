<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function get(Request $request){
        $news = DB::table('news')->where('city', $request->city)->get();

        return $news;
    }
}
