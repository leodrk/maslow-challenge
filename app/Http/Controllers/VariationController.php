<?php
namespace App\Http\Controllers;

use App\Http\Requests\VariationRequest;
use App\Models\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $variations = Variation::query()->paginate(10);
        return response()->json(['variations' => $variations]);
    }

    public function store(VariationRequest $request)
    {
        $variation = Variation::query()->create($request->all());
        return response()->json(['variation' => $variation]);
    }

    public function show($id)
    {
        $variation = Variation::query()->findOrFail($id);
        return response()->json(['variation' => $variation]);
    }

    public function update(VariationRequest $request, $id)
    {
        $variation = Variation::query()->findOrFail($id, $request->all())->update($request->all());
        return response()->json(['variation' => $variation]);
    }

    public function destroy($id)
    {
        Variation::query()->findOrFail($id)->delete();
        return response(['message' => 'OK'], 200);
    }
}
