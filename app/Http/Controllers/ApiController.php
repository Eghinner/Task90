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

    public function createStudent(Request $request) {
      // logic to create a student record goes here
    }

    public function getStudent($id) {
      // logic to get a student record goes here
    }

    public function updateStudent(Request $request, $id) {
      // logic to update a student record goes here
    }

    public function deleteStudent ($id) {
      // logic to delete a student record goes here
    }
}
