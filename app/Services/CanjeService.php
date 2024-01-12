<?php
namespace App\Services;

use App\Models\Canje;

class CanjeService
{
    public function getAllCanjes()
    {
        return Canje::all();
    }

    public function getCanjeById($id)
    {
        return Canje::findOrFail($id);
    }

    public function createCanje(array $data)
    {
        return Canje::create($data);
    }

    public function updateCanje($id, array $data)
    {
        $canje = $this->getCanjeById($id);
        $canje->update($data);

        return $canje;
    }

    public function deleteCanje($id)
    {
        $canje = $this->getCanjeById($id);
        $canje->delete();

        return $canje;
    }
}
