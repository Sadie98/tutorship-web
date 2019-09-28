<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    public function getByMentor(Request $request){
        if(!$request->mentor_id) return json_encode([
            'result' => false,
            'error' => 'Required parameter mentor_id missed'
        ]);

        $res = DB::select("SELECT `meetings`.*, 
            CONCAT(`childUser`.`name`, ' ', `childUser`.`surname`) `child`,
            CONCAT(`mentorUser`.`name`, ' ', `mentorUser`.`surname`) `mentor`,
            CONCAT(`curatorUser`.`name`, ' ', `curatorUser`.`surname`) `curator`
            FROM `meetings`
            LEFT JOIN `users`  as `childUser` ON `meetings`.`child_id` = `childUser`.`id`
            LEFT JOIN `users`  as `mentorUser` ON `meetings`.`mentor_id` = `mentorUser`.`id`
            LEFT JOIN `users`  as `curatorUser` ON `meetings`.`curator_id` = `curatorUser`.`id`
            WHERE `mentorUser`.`id` = '".(int)$request->mentor_id."'");

        return $res;
    }

    public function getByCurator(Request $request){
        if(!$request->curator_id) return json_encode([
            'result' => false,
            'error' => 'Required parameter curator_id missed'
        ]);

        return json_encode(DB::table('meetings')->where('curator_id', $request->curator_id))->get();
    }

    public function getById(Request $request){
        if(!$request->id) return json_encode([
            'result' => false,
            'error' => 'Required parameter id missed'
        ]);

        return json_encode(DB::table('meetings')->where('id', $request->id))->get();
    }

    public function add(Request $request){
        $data = [
            'date' => $request->date??'',
            'status' => $request->status??'unchecked',
            'mentor_id' => $request->mentor_id??0,
            'child_id' => $request->child_id??0,
            'curator_id' => $request->curator_id??0
        ];

        if(!$data['mentor_id'] || !$data['child_id'] || !!$data['curator_id']){
            return json_encode([
                'result' => false,
                'error' => 'One of mentor_id, child_id, curator_id is missing'
            ]);
        }

        $ok = DB::table('meetings')->insert($data);

        return json_encode(['result' => $ok]);
    }
}
