<?php
namespace App\Http\Controllers;

use App\Services\MarcaService;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    protected $marcaService;

    public function __construct(MarcaService $marcaService)
    {
        $this->marcaService = $marcaService;
    }

    public function index()
    {
        $marcas = $this->marcaService->getAllMarcas();
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $marca = $this->marcaService->createMarca($data);

    }

    public function show($id)
    {
        $marca = $this->marcaService->getMarcaById($id);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $marca = $this->marcaService->updateMarca($id, $data);
    }

    public function destroy($id)
    {
        $marca = $this->marcaService->deleteMarca($id);
    }
}
