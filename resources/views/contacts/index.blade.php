@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>CONTATOS</h1>
        <a href="{{ route('contacts.create') }}" class="btn btn-primary">Adicionar Novo Contato</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contato</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}">
                            {{ $contact->name }}
                        </a>
                    </td>
                    <td>{{ $contact->contact }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            
                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger ml-2">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection