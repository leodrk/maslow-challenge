<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $companies = Company::query()->paginate(10);
        return response()->json(['companies' => $companies]);
    }

    public function store(Request $request)
    {
        $company = Company::query()->create($request->all());
        return response()->json(['company' => $company]);
    }

    public function show($id)
    {
        $company = Company::query()->findOrFail($id);
        return response()->json(['company' => $company]);
    }

    public function update(Request $request, $id)
    {
        $company = Company::query()->findOrFail($id, $request->all())->update($request->all());
        return response()->json(['company' => $company]);
    }

    public function destroy($id)
    {
        Company::query()->findOrFail($id)->delete();
        return response(['message' => 'OK'], 200);
    }

    public function getEmployees(Company $company)
    {
        $company->employees()->paginate(10);
    }

    public function getEmployeeByFirstName(Company $company, $name)
    {
        $company->getEmployeeByFirstName($name)->paginate(10);
    }

    public function getEmployeeByLastName(Company $company, $lastName)
    {
        $company->getEmployeeByLastName($lastName)->paginate(10);
    }

    public function consumptionLastWeek(Company $company)
    {
        return $company->consumptionLastWeek();
    }

    public function billingByCompany(){
        return Company::billingByCompany();
    }
}
