<?php
namespace App\Services;

use App\Models\Marca;

class MarcaService
{
    public function getAllMarcas()
    {
        return Marca::all();
    }

    public function getMarcaById($id)
    {
        return Marca::findOrFail($id);
    }

    public function createMarca(array $data)
    {
        return Marca::create($data);
    }

    public function updateMarca($id, array $data)
    {
        $marca = $this->getMarcaById($id);
        $marca->update($data);

        return $marca;
    }

    public function deleteMarca($id)
    {
        $marca = $this->getMarcaById($id);
        $marca->delete();

        return $marca;
    }
}
