<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ApiController extends Controller
{
    public function getAllUsers() {
      $users = User::get()->toJson(JSON_PRETTY_PRINT);
      
      return response($users, 200);
    }

    public function getUser($id) {
    	
    }
}
