<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    public function index()
    {
        $contatos = Contato::all();

        return response()->json(['contatos' => $contatos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:contatos,email',
            'data_nascimento' => 'required|date',
            'cpf' => 'required|unique:contatos,cpf',
            'telefone' => 'required',
        ]);

        $contato = Contato::create($request->all());

        return response()->json(['contato' => $contato], 201);
    }

    public function show($id)
    {
        $contato = Contato::findOrFail($id);

        return response()->json(['contato' => $contato]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:contatos,email,' . $id,
            'data_nascimento' => 'required|date',
            'cpf' => 'required|unique:contatos,cpf,' . $id,
            'telefone' => 'required',
        ]);

        $contato = Contato::findOrFail($id);
        $contato->update($request->all());

        return response()->json(['contato' => $contato]);
    }

    public function destroy($id)
    {
        $contato = Contato::findOrFail($id);
        $contato->delete();

        return response()->json([], 204);
    }

    public function relatorio()
    {
        $contatos = Contato::all();
        return response()->json(['contatos' => $contatos]);
    }
}
