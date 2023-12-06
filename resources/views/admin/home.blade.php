@extends('layouts.admin')

@section('content')
    <h2 class="my-4">Home Dashboard</h2>
    <p class="mt-4">Qui puoi navigare all'interno del tuo database</p>
    <p class="mt-2">
        Cerca tutte le informazioni in base al
        <a href="{{ route('admin.projects.index') }}">Progetto</a>
        , alla
        <a href="{{ route('admin.tecnologies.index') }}">Tecnologia</a>
        usata oppure al
        <a href="{{ route('admin.types.index') }}">Tipo</a>
        .
    </p>
@endsection
