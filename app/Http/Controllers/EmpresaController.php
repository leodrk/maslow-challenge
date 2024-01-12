<?php
namespace App\Http\Controllers;

use App\Services\EmpresaService;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    protected $empresaService;

    public function __construct(EmpresaService $empresaService)
    {
        $this->empresaService = $empresaService;
    }

    public function index()
    {
        $empresas = $this->empresaService->getAllEmpresas();
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $empresa = $this->empresaService->createEmpresa($data);
    }

    public function show($id)
    {
        $empresa = $this->empresaService->getEmpresaById($id);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $empresa = $this->empresaService->updateEmpresa($id, $data);

    }

    public function destroy($id)
    {
        $empresa = $this->empresaService->deleteEmpresa($id);
    }
}
