<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Department;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = DB::table('departments')
            ->select('departments.*')
            ->get();

        return response()->json(
            [
                'status' => 'success',
                'departments' => $departments->toArray()
            ], 200);
    }

    public function show(Request $request, $id)
    {
        $department = DB::table('departments')
            ->select('departments.*')
            ->where("departments.id",$id)
            ->get();

        return response()->json(
            [
                'status' => 'success',
                'department' => $department->toArray()
            ], 200);
    }

    public function update(Request $request, $id)
    {

        $v = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        if ($v->fails())
        {
            return response()->json([
                'error' => 'registration_validation_error',
                'errors' => $v->errors()
            ], 422);
        }

        $department = $request->isMethod('put') ? Department::findOrFail($request->id) : new Department;
        $department->name = $request->input('name');
        $department->save();

        return response()->json(['status' => 'success'], 200);
    }

    public function register(Request $request)
    {

        $v = Validator::make($request->all(), [
            'name' => 'required',

        ]);

        if ($v->fails())
        {
            return response()->json([
                'error' => 'registration_validation_error',
                'errors' => $v->errors()
            ], 422);
        }

        $department = new Department;
        $department->name = $request->input('name');
        $department->save();

        return response()->json(['status' => 'success'], 200);
    }
}
