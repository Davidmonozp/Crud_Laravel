@extends('app')

@section('content')
    <div class="container w-75 border p-4 mt-5">
        <h2>Editar cliente</h2>

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('clientes.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td><input type="text" name="nombre" value="{{ $cliente->nombre }}"></td>
                        <td><input type="text" name="email" value="{{ $cliente->email }}"></td>
                        <td> <button type="submit" class="btn btn-success">Guardar</button> <a
                                href="{{ route('clientes.show', $cliente) }}" class="btn btn-primary">Cancelar</a></td>
                    </tr>

                </tbody>

            </table>

            <a href="{{ route('clientes.show') }}" class="btn btn-primary ">Listado de clientes</a>
            <a href="{{ route('clientes.index') }}" class="btn btn-dark ">Registrar cliente</a>

        </form>

    </div>
@endsection
