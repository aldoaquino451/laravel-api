@extends('layouts.admin')

@section('content')
    <h2 class="my-4">Lista delle Tecnologie</h2>

    <div class=" w-75">

        <section>
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

            <form action="{{ route('admin.tecnologies.store') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nuova Tecnologia" name="name">
                    <input type="number" step="0.01" class="form-control" placeholder="Versione" name="version">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-primary">Aggiungi</button>
                    </div>
                </div>
            </form>
        </section>

        <table class="table ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Versione</th>
                    <th scope="col" style="width: 155px">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tecnologies as $index => $tecnology)
                    <tr>
                        <form action="{{ route('admin.tecnologies.update', $tecnology) }}" method="POST">
                            <th scope="row">
                                {{ $tecnology->id }}
                            </th>

                            @csrf
                            @method('PUT')
                            <td class=" text-capitalize">
                                @if ($tecnology->id === $id_edit)
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $tecnology->name }}">
                                    <div class="input-group mb-3">
                                    </div>
                                @else
                                    {{ $tecnology->name }}
                                @endif
                            </td>

                            <td class=" text-capitalize ">
                                <div class="d-flex gap-3">

                                    @if ($tecnology->id === $id_edit)
                                        <input type="number" step='0.01' class="form-control" name="version"
                                            value="{{ $tecnology->version }}">
                                    @else
                                        {{ $tecnology->version }}
                                    @endif
                                    @if ($tecnology->id === $id_edit)
                                        <button type="submit" class="btn btn-success    ">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </form>

                        <td>
                            <a href="{{ route('admin.tecnologies.edit', $tecnology) }}"
                                class="btn btn-warning d-inline-block">
                                <i class="fa-solid fa-pencil"></i>
                            </a>

                            <form action="{{ route('admin.tecnologies.destroy', $tecnology) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button tecnology="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $tecnologies->links() }}
    </div>
@endsection
