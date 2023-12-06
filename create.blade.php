@extends('layouts.admin')

@section('content')
    <h2 class="my-4">Lista dei Tipi</h2>


    <div class=" w-50">

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success " role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.types.store') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nuovo Tipo" name="name">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-primary" type="button">Aggiungi</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col" style="width: 155px">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type => $index)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td class=" text-capitalize">
                            @if ($id_edit === $index)
                                <form action="{{ route('admin.types.update', $type) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Nuovo Tipo" name="name">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-secondary"
                                                type="button">Modifica</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                {{ $type->name }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning d-inline-block">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $types->links() }}
    </div>
@endsection
