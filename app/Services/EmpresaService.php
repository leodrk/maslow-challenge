<?php
namespace App\Services;

use App\Models\Empresa;

class EmpresaService
{
    public function getAllEmpresas()
    {
        return Empresa::all();
    }

    public function getEmpresaById($id)
    {
        return Empresa::findOrFail($id);
    }

    public function createEmpresa(array $data)
    {
        return Empresa::create($data);
    }

    public function updateEmpresa($id, array $data)
    {
        $empresa = $this->getEmpresaById($id);
        $empresa->update($data);

        return $empresa;
    }

    public function deleteEmpresa($id)
    {
        $empresa = $this->getEmpresaById($id);
        $empresa->delete();

        return $empresa;
    }
}
