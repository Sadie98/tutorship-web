<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class CityController extends Controller
{
    public function getAll(){
        $cities = DB::table('cities')->get();

        return $cities;
    }

    public function add(Request $request){
        $data = [
            'name' => '',
            'website' => '',
            'logo' => '',
            'description' => '',
            'email' => '',
            'voice' => ''
        ];
        try{
            if ($request->name) {
                $data['name'] = $request->name;
            }else{
                throw new Exception('Required parameter name missed');
            }
            if ($request->website) $data['website'] = $request->website;
            if ($request->logo) $data['logo'] = $request->logo;
            if ($request->description) $data['description'] = $request->description;
            if ($request->email) $data['email'] = $request->email;
            if ($request->voice) $data['voice'] = $request->voice;
        }catch (\Exception $e){
            return json_encode([
                'result' => false,
                'error' => $e->getMessage()
            ]);
        }

        $ok = DB::table('cities')->insert($data);

        return json_encode(['result' => $ok]);
    }
}
