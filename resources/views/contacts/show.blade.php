@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h2>Detalhes do Contato</h2>
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $contact->id }}</p>
            <p><strong>Nome:</strong> {{ $contact->name }}</p>
            <p><strong>Contato:</strong> {{ $contact->contact }}</p>
            <p><strong>E-mail:</strong> {{ $contact->email }}</p>
        </div>
        <div class="card-footer d-flex gap-2">
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Editar</a>
            
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" 
                  onsubmit="return confirm('Deseja realmente excluir este contato?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
@endsection