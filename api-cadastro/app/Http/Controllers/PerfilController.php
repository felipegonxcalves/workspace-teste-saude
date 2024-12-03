<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerfilRequest;
use App\Services\PerfilService;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public $perfilService;

    public function __construct(PerfilService $perfil)
    {
        $this->perfilService = $perfil;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerfilRequest $request)
    {
        return $this->perfilService->criarPerfil($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
