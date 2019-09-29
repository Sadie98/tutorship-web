<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelsController extends Controller
{
    public function get(Request $request){
        $w = '`curator_id` = -1;';
        if($request->curator_id) $w = 'WHERE `curator_id` = '.(int)$request->curator_id;
        if($request->mentor_id) $w = 'WHERE `mentor_id` = '.(int)$request->mentor_id;
        if($request->child_id) $w = 'WHERE `child_id` = '.(int)$request->child_id;

        $res = (array)DB::select("SELECT
CONCAT(`child`.`name`, ' ', `child`.`surname`) `child`,
CONCAT(`mentor`.`name`, ' ', `mentor`.`surname`) `mentor`,
CONCAT(`curator`.`name`, ' ', `curator`.`surname`) `curator`,
`child`.`id` `child_id`, `mentor`.`id` `mentor_id`, `curator`.`id` `curator_id`
FROM `rels`
LEFT JOIN `users` `child` ON  `rels`.`child_id` = `child`.`id`
LEFT JOIN `users` `mentor` ON  `rels`.`mentor_id` = `mentor`.`id`
LEFT JOIN `users` `curator` ON  `rels`.`curator_id` = `curator`.`id` ".$w);

        return json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}
