@extends('layouts.admin')

@section('content')
    <h2>Modifica il Progetto {{ $project->name }}</h2>
    <div class="w-75">

        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')

            <div class=" form-group m-3">
                <label for="name">Inserisci il Nome</label>
                <input class=" form-control" type="text" id="name" name="name" value="{{ $project->name }}">
            </div>

            {{--  --}}
            <div class="btn-group mx-3" role="group" aria-label="Basic checkbox toggle button group">
                @foreach ($tecnologies as $tecnology)
                    <input name="tecnologies[]" value="{{ $tecnology->id }}" type="checkbox" class="btn-check"
                        id="btncheck_{{ $tecnology->id }}" autocomplete="off">
                    <label class="btn btn-outline-primary"
                        for="btncheck_{{ $tecnology->id }}">{{ $tecnology->name }}</label>
                @endforeach
            </div>

            {{--  --}}
            <div class="form-group m-3">
                <label for="description">Inserisci la Descrizione</label>
                <textarea class=" form-control" type="text" id="description" name="description" cols="30" rows="10">{{ $project->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>

        </form>

    </div>
@endsection
