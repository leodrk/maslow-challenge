<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $employees = Employee::query()->paginate(10);
        return response()->json(['employees' => $employees]);
    }

    public function store(EmployeeRequest $request)
    {
        $employee = Employee::query()->create($request->all());
        return response()->json(['employee' => $employee]);
    }

    public function show($id)
    {
        $employee = Employee::query()->findOrFail($id);
        return response()->json(['employee' => $employee]);
    }

    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::query()->findOrFail($id, $request->all())->update($request->all());
        return response()->json(['employee' => $employee]);
    }

    public function destroy($id)
    {
        Employee::query()->findOrFail($id)->delete();
        return response(['message' => 'OK'], 200);
    }

    public function getOrders(Employee $employee){
        return $employee->getOrders();
    }

}
