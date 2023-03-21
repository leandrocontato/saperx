@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Excluir Contato</h2>
        <hr>
        <p>Deseja realmente excluir o contato <strong>{{ $contato->nome }}</strong>?</p>
        <form action="{{ route('contatos.destroy', $contato) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Excluir</button>
                <a href="{{ route('contatos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
