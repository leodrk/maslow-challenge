<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VariationController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
    }

    public function store(Request $request)
    {
        $data = $request->all();
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
