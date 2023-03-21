@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalhes do Contato</h2>
        <hr>
        <dl class="row">
            <dt class="col-sm-3">Nome:</dt>
            <dd class="col-sm-9">{{ $contato->nome }}</dd>

            <dt class="col-sm-3">E-mail:</dt>
            <dd class="col-sm-9">{{ $contato->email }}</dd>

            <dt class="col-sm-3">Data de Nascimento:</dt>
            <dd class="col-sm-9">{{ date('d/m/Y', strtotime($contato->data_nascimento)) }}</dd>

            <dt class="col-sm-3">CPF:</dt>
            <dd class="col-sm-9">{{ $contato->cpf }}</dd>

            <dt class="col-sm-3">Telefone:</dt>
            <dd class="col-sm-9">{{ $contato->telefone }}</dd>
        </dl>
        <div class="text-right">
            <a href="{{ route('contatos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection
