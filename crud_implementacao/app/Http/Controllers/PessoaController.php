<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Models\Pessoa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PessoaController extends Controller
{

    public function getPessoaById(Request $request)
    {
        try {
            if (!$p = Pessoa::find($request->id)) {
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => 'Recurso não encontrado',
                ], 404);
            }

            return response()->json([
                'sucesso' => true,
                'data' => $p,
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $e->getMessage(),
            ], 500);
        }

    }

    public function createNewPessoa(NewPessoaRequest $request)
    {

        try {
            $data = $request->only(['nome', 'cpf', 'email', 'data_nasc', 'nacionalidade']);
            return response()->json([
                'sucesso' => true,
                'data' => Pessoa::create($data),
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $e->getMessage(),
            ], 500);
        }
    }

    public function updatePessoa(UpdatePessoaRequest $request)
    {

        try {
            if (!$p = Pessoa::find($request->id)) {
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => 'Recurso não encontrado',
                ], 404);
            }

            $data = $request->only(['nome', 'email', 'data_nasc', 'nacionalidade']);
            $p->update($data);

            return response()->json([
                'sucesso' => true,
                'data' => $p,
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $e->getMessage(),
            ], 500);
        }

        dd($p);

    }

    public function deletePessoaById(Request $request)
    {
        try {
            if (!$p = Pessoa::find($request->id)) {
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => 'Recurso não encontrado',
                ], 404);
            }

            $p->delete();
            return response()->json([
                'sucesso' => true,
                'mensagem' => 'Recurso removido com sucesso',
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $e->getMessage(),
            ], 500);
        }

    }

}
