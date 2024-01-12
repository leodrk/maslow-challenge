<?php

namespace App\Http\Controllers;

use App\Services\CanjeService;
use Illuminate\Http\Request;

class CanjeController extends Controller
{
    protected $canjeService;

    public function __construct(CanjeService $canjeService)
    {
        $this->canjeService = $canjeService;
    }

    public function index()
    {
        $canjes = $this->canjeService->getAllCanjes();
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $canje = $this->canjeService->createCanje($data);
    }

    public function show($id)
    {
        $canje = $this->canjeService->getCanjeById($id);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $canje = $this->canjeService->updateCanje($id, $data);
    }

    public function destroy($id)
    {
        $canje = $this->canjeService->deleteCanje($id);
    }

}
