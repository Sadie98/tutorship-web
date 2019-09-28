<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function get(Request $request){
        return json_encode(DB::table('users')->get()->where('id', $request->id));
    }

    public function add(Request $request){
        $data = [
            'name' => $request->name??'',
            'surname' => $request->surname??'',
            'patronymic' => $request->patronymic??'',
            'age' => $request->age??'',
            'city' => $request->city??'',
            'role' => $request->role??'',
            'workplace' => $request->workplace??'',
            'avatar' => $request->avatar??''
        ];

        $ok = DB::table('users')->insert($data);

        return json_encode(['result' => $ok]);
    }
}
