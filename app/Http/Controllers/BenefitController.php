<?php

namespace App\Http\Controllers;

use App\Http\Resources\BenefitResource;
use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{


    public function __construct()
    {
    }

    public function index()
    {
        $benefits = Benefit::query()->paginate(10);
        return response()->json(['benefits' => $benefits]);
    }

    public function store(Request $request)
    {
        $benefit = Benefit::query()->create($request->all());
        return response()->json(['benefit' => $benefit]);
    }

    public function show($id)
    {
        $benefit = Benefit::query()->findOrFail($id);
        return response()->json(['benefit' => $benefit]);
    }

    public function update(Request $request, $id)
    {
        $benefit = Benefit::query()->findOrFail($id, $request->all())->update($request->all());
        return response()->json(['benefit' => $benefit]);
    }

    public function destroy($id)
    {
        Benefit::query()->findOrFail($id)->delete();
        return response(['message' => 'OK'], 200);
    }

    function getByName($name)
    {
        return Benefit::getByName($name);
    }

    function getByCountry($country)
    {
        return Benefit::getByCountry($country);
    }

    public function getVariations(Benefit $benefit)
    {
        $benefit->variations()->paginate(10);
    }
}
