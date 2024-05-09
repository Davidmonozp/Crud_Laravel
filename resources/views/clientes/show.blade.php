@extends('app')

@section('content')
    <div class="container w-75 border p-4 mt-5">
        <h2>Listado de Clientes</h2> <br>


        <!-- Formulario de búsqueda por nombre -->
        <form action="{{ route('clientes.show') }}" method="GET" class="mb-2">
            <div class="input-group justify-content-end">
                <input type="text" class="form-control-sm" name="nombre" placeholder="Buscar por nombre...">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('clientes.show') }}" class="btn btn-dark ">Listado de clientes </a>
            </div>
        </form>

        @if ($clientes->isEmpty())
            <p>No hay clientes registrados.</p>
        @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Editar </th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td><a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-primary">Editar cliente</a>
                            </td>
                            <td>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <a href="{{ route('clientes.index') }}" class="btn btn-dark ">Registrar cliente</a>
            <div class="pagination">
                @if(isset($previousPageUrl))
                    <a href="{{ $previousPageUrl }}" class="btn btn-primary">Atrás</a>
                @endif
                
                @if(isset($nextPageUrl))
                    <a href="{{ $nextPageUrl }}" class="btn btn-primary">Adelante</a>
                @endif
            </div>
            
        @endif
    </div>

@endsection
