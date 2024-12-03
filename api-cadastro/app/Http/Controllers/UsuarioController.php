<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->usuarioService->listarUsuarios($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        return $this->usuarioService->criarUsuario($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return $this->usuarioService->visualizarUsuario($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUsuarioRequest $request, string $id)
    {
        return $this->usuarioService->alterarUsuario($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->usuarioService->deletarUsuario($id);
    }
}
