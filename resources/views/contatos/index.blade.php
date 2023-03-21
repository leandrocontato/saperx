@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Contatos</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Data de Nascimento</th>
                                    <th>CPF</th>
                                    <th>Telefones</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contatos as $contato)
                                    <tr>
                                        <td>{{ $contato->nome }}</td>
                                        <td>{{ $contato->email }}</td>
                                        <td>{{ $contato->data_nascimento }}</td>
                                        <td>{{ $contato->cpf }}</td>
                                        <td>{{ $contato->telefone }}</td>
                                        <td>
                                            <a href="{{ route('contatos.edit', $contato->id) }}"
                                                class="btn btn-primary">Editar</a>

                                            <form action="{{ route('contatos.destroy', $contato->id) }}" method="POST"
                                                style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Tem certeza que deseja excluir este contato?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
