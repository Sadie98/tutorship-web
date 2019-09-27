<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TaskController extends Controller
{
    public function index(){
    	return User::all();
    }

}
