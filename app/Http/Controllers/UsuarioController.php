<?php
namespace App\Http\Controllers;

use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function index()
    {
        $usuarios = $this->usuarioService->getAllUsuarios();
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $usuario = $this->usuarioService->createUsuario($data);
    }

    public function show($id)
    {
        $usuario = $this->usuarioService->getUsuarioById($id);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $usuario = $this->usuarioService->updateUsuario($id, $data);
    }

    public function destroy($id)
    {
        $usuario = $this->usuarioService->deleteUsuario($id);
    }
}
