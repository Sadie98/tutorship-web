<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function add(Request $request){
        $data = [
            'meeting_id' => $request->meeting_id??'',
            'duration' => $request->duration??'',
            'plan_actions' => $request->plan_actions??'',
            'real_actions' => $request->real_actions??'',
            'child_mood' => $request->child_mood??'',
            'next_points' => $request->next_points??'',
            'mentor_mood' => $request->mentor_mood??'',
            'additional_comment' => $request->additional_comment??'',
            'answers' => $request->answers??''
        ];
        foreach($data as $fieldName => $fieldName){
            if(!$fieldName) return json_encode([
                'result' => false,
                'error' => "Required parameter $fieldName missed"
            ]);
        }

        $ok = DB::table('reports')->insert($data);

        return json_encode(['result' => $ok]);
    }

    public function edit(Request $request){
        if(!$request->meeting_id) return json_encode([
            'result' => false,
            'error' => 'Required parameter meeting_id missed'
        ]);

        $data = [];
        if($request->duration) $data['duration'] = $request->duration;
        if($request->plan_actions) $data['plan_actions'] = $request->plan_actions;
        if($request->real_actions) $data['real_actions'] = $request->real_actions;
        if($request->child_mood) $data['child_mood'] = $request->child_mood;
        if($request->next_points) $data['next_points'] = $request->next_points;
        if($request->mentor_mood) $data['mentor_mood'] = $request->mentor_mood;
        if($request->answers) $data['answers'] = $request->answers;

        $ok = DB::table(reports)->where('meeting_id', $request->meeting_id)->update($data);

        return json_encode(['result' => $ok]);
    }
}
