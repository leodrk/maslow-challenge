<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
    }

    public function store(Request $request)
    {
        return Company::create();
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

    public function consumptionLastWeek(Company $company)
    {
        return $company->consumptionLastWeek();
    }
}
