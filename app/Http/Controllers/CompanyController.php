<?php
namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyUpdateRequest;
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

    public function store(CompanyRequest $request)
    {
        $company = Company::query()->create($request->all());
        return response()->json(['company' => $company]);
    }

    public function show($id)
    {
        $company = Company::query()->findOrFail($id);
        return response()->json(['company' => $company]);
    }

    public function update(CompanyUpdateRequest $request, $id)
    {
        $company = Company::query()->findOrFail($id)->update($request->all());
        return response()->json(['company' => $company]);
    }

    public function destroy($id)
    {
        Company::query()->findOrFail($id)->delete();
        return response(['message' => 'OK'], 200);
    }

    public function getEmployees(Company $company)
    {
        return $company->employees()->paginate(10);
    }

    public function getEmployeeByFirstName(Company $company, $name)
    {
        return $company->getEmployeeByFirstName($name)->paginate(10);
    }

    public function getEmployeeByLastName(Company $company, $lastName)
    {
        return $company->getEmployeeByLastName($lastName)->paginate(10);
    }

    public function consumptionLastWeek(Company $company)
    {
        return $company->consumptionLastWeek();
    }

    public function billingByCompany(){
        return Company::billingByCompany();
    }
}
