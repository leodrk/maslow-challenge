<?php

namespace App\Http\Controllers;

use App\Services\EmpleadoService;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    protected $empleadoService;

    public function __construct(EmpleadoService $empleadoService)
    {
        $this->empleadoService = $empleadoService;
    }

    public function index()
    {
        $empleados = $this->empleadoService->getAllEmpleados();
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $empleado = $this->empleadoService->createEmpleado($data);
    }

    public function show($id)
    {
        $empleado = $this->empleadoService->getEmpleadoById($id);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $empleado = $this->empleadoService->updateEmpleado($id, $data);
    }

    public function destroy($id)
    {
        $empleado = $this->empleadoService->deleteEmpleado($id);
    }

}
