@extends('layouts.app')

@section('content')
    <h1>Relatório de Contatos</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contatos as $contato)
                <tr>
                    <td>{{ $contato->nome }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>{{ $contato->data_nascimento }}</td>
                    <td>{{ $contato->cpf }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
