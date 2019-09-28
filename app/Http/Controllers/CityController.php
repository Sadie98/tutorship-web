<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CityController extends Controller
{
    public function getAll(){
        return json_encode(DB::table('cities')->get(), JSON_UNESCAPED_UNICODE);
    }

    public function add(Request $request){
        $data = [
            'name' => $request->name??'',
            'website' => $request->websitge??'',
            'logo' => $request->logo??'',
            'description' => $request->description??'',
            'email' => $request->email??'',
            'voice' => $request->voice??''
        ];
        if(!$data['name']){
            return json_encode([
                'result' => false,
                'error' => 'Required parameter name missed'
            ]);
        }

        $ok = DB::table('cities')->insert($data);

        return json_encode(['result' => $ok]);
    }
}
