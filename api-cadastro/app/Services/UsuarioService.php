<?php

namespace App\Services;

use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UsuarioService
{

    public function listarUsuarios(object $data): JsonResponse
    {
        $usuarios = Usuario::query()->paginate(10);
        return response()->json(['usuarios' => $usuarios]);
    }

    public function criarUsuario(object $data): JsonResponse
    {
        try {
            DB::beginTransaction();

            $id = DB::table('usuarios')->insertGetId([
                'nome'       => $data->nome,
                'email'      => $data->email,
                'cpf'        => $data->cpf,
                'id_perfil'  => $data->id_perfil,
                'created_at' => now()
            ]);

            $enderecosUsuario = $this->setEndereco($data, $id);

            DB::table('enderecos')->insert($enderecosUsuario);

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Usuário cadastrado com sucesso!']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function visualizarUsuario(int $id): JsonResponse
    {
        $usuario = DB::select('SELECT * FROM usuarios WHERE id = :id', ['id' => $id]);
        $enderecos = DB::select('SELECT * FROM enderecos WHERE id_usuario = :id', ['id' => $id]);

        $data = [];

        if (count($usuario) != 0) {
            $data = [
                'usuario' => $usuario[0],
                'enderecos_usuario' => $enderecos
            ];
        }

        return response()->json(['data' => $data]);
    }

    public function alterarUsuario(object $data, int $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            DB::table('usuarios')->where('id', $id)
                ->update([
                    'nome'       => $data->nome,
                    'email'      => $data->email,
                    'cpf'        => $data->cpf,
                    'id_perfil'  => $data->id_perfil,
                    'updated_at' => now()
                ]);

            DB::table('enderecos')->where('id_usuario', '=', $id)->delete();

            $enderecosUsuario = $this->setEndereco($data, $id);

            DB::table('enderecos')->insert($enderecosUsuario);

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Usuário alterado com sucesso!']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function deletarUsuario(int $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            DB::table('usuarios')->where('id', '=', $id)->delete();
            DB::table('enderecos')->where('id_usuario', '=', $id)->delete();

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Usuário deletado com sucesso!']);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    private function setEndereco(object $data, int $id): array
    {
        $enderecos = [];

        foreach ($data->enderecos as $endereco) {
            $enderecos[] = [
                'logradouro' => $endereco['logradouro'],
                'numero' => $endereco['numero'] ?? null,
                'bairro' => $endereco['bairro'] ?? null,
                'cep' => $endereco['cep'],
                'complemento' => $endereco['complemento'] ?? null,
                'cidade' => $endereco['cidade'],
                'estado' => $endereco['estado'],
                'id_usuario' => $id,
                'created_at' => now()
            ];
        }

        return $enderecos;
    }
}
