<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalaryController extends Controller
{
    public function get(Request $request){
        if(!$request->user_id) return json_encode([
            'result' => false,
            'error' => 'Required parameter user_id missed'
        ]);

        $photos = DB::table('galery')->where('user_id', $request->user_id)->get();

        return $photos;
    }
}
