<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ApiController extends Controller
{
    public function getAllUsers(Request $request) {
//      $users = User::get()->toJson(JSON_PRETTY_PRINT);
      $users = User::latest()->take(5);
       if (request('name')) {
       	$users->where('name', request('name'));
       }

//      return response($users, 200);
      return $users->get();
    }





    public function getUser($id) { 	
    }
}
