<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeetingController extends Controller
{
    var $joinsQuery = "SELECT `meetings`.*, `reports`.*,
            CONCAT(`childUser`.`name`, ' ', `childUser`.`surname`) `child`,
            CONCAT(`mentorUser`.`name`, ' ', `mentorUser`.`surname`) `mentor`,
            CONCAT(`curatorUser`.`name`, ' ', `curatorUser`.`surname`) `curator`
            FROM `meetings`
            LEFT JOIN `users`  as `childUser` ON `meetings`.`child_id` = `childUser`.`id`
            LEFT JOIN `users`  as `mentorUser` ON `meetings`.`mentor_id` = `mentorUser`.`id`
            LEFT JOIN `users`  as `curatorUser` ON `meetings`.`curator_id` = `curatorUser`.`id`
            LEFT JOIN `reports` ON `meetings`.`id` = `reports`.`meeting_id`";

    public function getByMentor(Request $request){
        if(!$request->mentor_id) return json_encode([
            'result' => false,
            'error' => 'Required parameter mentor_id missed'
        ]);

        $res = (array)DB::select($this->joinsQuery." WHERE `mentorUser`.`id` = '".(int)$request->mentor_id."' ORDER BY `meetings`.`date` DESC");

        foreach($res as $meetingIndex => &$_meeting){
            if(isset($res[$meetingIndex + 1]) && $res[$meetingIndex + 1]->next_points){
                $_meeting->todo = $res[$meetingIndex + 1]->next_points;
            }
        }

        return json_encode($res, JSON_UNESCAPED_UNICODE);
    }

    public function getByCurator(Request $request){
        if(!$request->curator_id) return json_encode([
            'result' => false,
            'error' => 'Required parameter curator_id missed'
        ]);

        $res = DB::select($this->joinsQuery." WHERE `mentorUser`.`id` = '".(int)$request->curator_id."' ORDER BY `meetings`.`date` DESC");

        return json_encode($res, JSON_UNESCAPED_UNICODE);
    }

    public function getById(Request $request){
        if(!$request->id) return json_encode([
            'result' => false,
            'error' => 'Required parameter id missed'
        ]);

        $res = DB::select($this->joinsQuery." WHERE `meetings`.`id` = '".(int)$request->id."' ORDER BY `meetings`.`date` DESC");

        return json_encode($res, JSON_UNESCAPED_UNICODE);
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
