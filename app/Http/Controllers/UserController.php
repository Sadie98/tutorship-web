<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function get(Request $request){
        if(!$request->id) return json_encode([
            'result' => false,
            'error' => 'Required parameter id missed'
        ]);

        $res = DB::table('users')->where('id', $request->id)->get()[0]??'';
        return json_encode($res, JSON_UNESCAPED_UNICODE);
    }

    public function add(Request $request){
        $data = [
            'name' => $request->name??'',
            'surname' => $request->surname??'',
            'patronymic' => $request->patronymic??'',
            'age' => (int)$request->age??0,
            'city' => $request->city??'',
            'role' => $request->role??'',
            'workplace' => $request->workplace??'',
            'avatar' => $request->avatar??'',
            'email' => $request->email??''
        ];
        if(!$data['name']){
            return json_encode([
                'result' => false,
                'error' => 'Required parameter name missed'
            ]);
        }

        $ok = DB::table('users')->insert($data);

        return json_encode(['result' => $ok]);
    }
}
