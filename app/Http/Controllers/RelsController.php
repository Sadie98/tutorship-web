<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelsController extends Controller
{
    public function get(Request $request){
        $res = DB::table(rels)
            ->where('curator_id', $request->curator_id??0)
            ->orWhere('mentor_id', $request->mentor_id??0)
            ->orWhere('child_id', $request->child_id??0)
            ->get();

        return json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}
