<?php
namespace App\Services;

use App\Models\Empleado;

class EmpleadoService
{
    public function getAllEmpleados()
    {
        return Empleado::all();
    }

    public function getEmpleadoById($id)
    {
        return Empleado::findOrFail($id);
    }

    public function createEmpleado(array $data)
    {
        return Empleado::create($data);
    }

    public function updateEmpleado($id, array $data)
    {
        $empleado = $this->getEmpleadoById($id);
        $empleado->update($data);

        return $empleado;
    }

    public function deleteEmpleado($id)
    {
        $empleado = $this->getEmpleadoById($id);
        $empleado->delete();

        return $empleado;
    }
}
