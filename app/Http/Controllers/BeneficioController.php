<?php

namespace App\Http\Controllers;

use App\Services\BeneficioService;
use Illuminate\Http\Request;

class BeneficioController extends Controller
{
    protected $beneficioService;

    public function __construct(BeneficioService $beneficioService)
    {
        $this->beneficioService = $beneficioService;
    }

    public function index()
    {
        $beneficios = $this->beneficioService->getAllBeneficios();
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $beneficio = $this->beneficioService->createBeneficio($data);

    }

    public function show($id)
    {
        $beneficio = $this->beneficioService->getBeneficioById($id);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $beneficio = $this->beneficioService->updateBeneficio($id, $data);
    }

    public function destroy($id)
    {
        $beneficio = $this->beneficioService->deleteBeneficio($id);

    }
}
