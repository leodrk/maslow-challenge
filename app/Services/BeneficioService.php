<?php
namespace App\Services;

use App\Models\Beneficio;

class BeneficioService
{
    public function getAllBeneficios()
    {
        return Beneficio::all();
    }

    public function getBeneficioById($id)
    {
        return Beneficio::findOrFail($id);
    }

    public function createBeneficio(array $data)
    {
        return Beneficio::create($data);
    }

    public function updateBeneficio($id, array $data)
    {
        $beneficio = $this->getBeneficioById($id);
        $beneficio->update($data);

        return $beneficio;
    }

    public function deleteBeneficio($id)
    {
        $beneficio = $this->getBeneficioById($id);
        $beneficio->delete();

        return $beneficio;
    }
}
