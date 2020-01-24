<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('departments.name as department_name','users.*')
            ->get();

            //User::all();

        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);
    }

    public function show(Request $request, $id)
    {
        $user = DB::table('users')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->select('departments.name as department_name','users.*')
            ->where("users.id",$id)
            ->get();

        //User::find($id);

        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }


}
