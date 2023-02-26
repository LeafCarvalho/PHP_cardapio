<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\cardapio;
use DB;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function index() {
        $cardapio = Cardapio::query()->orderBy('nome')->get();

        return response()->json($cardapio);
    }

    public function create() {
        return view('cardapio.create');
    }

    public function store(Request $request) {
        $cardapio = new Cardapio();
        $cardapio->nome = $request->input('nome');
        $cardapio->preco = $request->input('preco');
        $cardapio->tipo = $request->input('tipo');
        $cardapio->save();

        return response('O item foi adicionado ao cardápio com sucesso!', 200);
    }

    public function show($id) {
        $cardapio = Cardapio::find($id);

        if (!$cardapio) {
            return response()->json(['message' => 'Cardápio não encontrado'], 404);
        }

        return response()->json($cardapio);
    }

    public function edit(Request $request, $id)
    {
        $cardapio = Cardapio::findOrFail($id);

        // Atualiza somente os campos que foram recebidos na solicitação PATCH
        $cardapio->fill($request->only([
            'nome',
            'preco',
            'tipo',
        ]));

        // Salva as alterações no banco de dados
        $cardapio->save();

        // Retorna uma resposta em JSON com a mensagem de sucesso
        return response()->json(['message' => 'Cardápio atualizado com sucesso']);
    }

    public function update(Request $request, $id) {
        $cardapio = Cardapio::findOrFail($id);
        $cardapio->nome = $request->input('nome');
        $cardapio->preco = $request->input('preco');
        $cardapio->tipo = $request->input('tipo');
        $cardapio->save();

        return redirect()->route('cardapio.index');
    }

    public function destroy($id) {
        $cardapio = Cardapio::findOrFail($id);
        $cardapio->delete();

        return redirect()->route('cardapio.index');
    }
}
