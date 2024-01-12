<?php
namespace App\Services;

use App\Models\Variacion;

class VariacionService
{
    public function getAllVariaciones()
    {
        return Variacion::all();
    }

    public function getVariacionById($id)
    {
        return Variacion::findOrFail($id);
    }

    public function createVariacion(array $data)
    {
        return Variacion::create($data);
    }

    public function updateVariacion($id, array $data)
    {
        $variacion = $this->getVariacionById($id);
        $variacion->update($data);

        return $variacion;
    }

    public function deleteVariacion($id)
    {
        $variacion = $this->getVariacionById($id);
        $variacion->delete();

        return $variacion;
    }
}
