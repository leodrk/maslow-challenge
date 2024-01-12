<?php
namespace App\Http\Controllers;

use App\Services\VariacionService;
use Illuminate\Http\Request;

class VariacionController extends Controller
{
    protected $variacionService;

    public function __construct(VariacionService $variacionService)
    {
        $this->variacionService = $variacionService;
    }

    public function index()
    {
        $variaciones = $this->variacionService->getAllVariaciones();
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $variacion = $this->variacionService->createVariacion($data);
    }

    public function show($id)
    {
        $variacion = $this->variacionService->getVariacionById($id);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $variacion = $this->variacionService->updateVariacion($id, $data);
    }

    public function destroy($id)
    {
        $variacion = $this->variacionService->deleteVariacion($id);
    }
}
