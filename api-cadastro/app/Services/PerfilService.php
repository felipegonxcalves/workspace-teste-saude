<?php

namespace App\Services;

use App\Models\Perfil;
use Illuminate\Http\JsonResponse;

class PerfilService
{
    public function criarPerfil(array $data): JsonResponse
    {
        try {
            $perfil = Perfil::create([
                'nome' => $data['nome'],
                'descricao' => $data['descricao'] ?? null
            ]);

            return response()->json(['message' => 'Perfil criado com sucesso.'], 201);
        } catch (\Exception $e) {
            $response = [
                'message' => $e->getMessage(),
                'code' => $e->getCode()
            ];

            return response()->json($response);
        }
    }

    public function deletarPerfil(Perfil $perfil)
    {

    }
}
