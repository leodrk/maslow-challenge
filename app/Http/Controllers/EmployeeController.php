<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
    }

    public function store(Request $request)
    {
        return Employee::create($request->all());
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
    }

    public function destroy($id)
    {
    }

}
