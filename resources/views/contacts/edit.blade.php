@extends('layouts.app')

@section('content')
    <h1>Editar Contato</h1>
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('contacts.partials._form')
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection