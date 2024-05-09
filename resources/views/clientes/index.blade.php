@extends('app');


@section('content')
    <div class="container w-25 border p-4 mt-5">

        <h1>Registrar cliente</h1>

        <form action="{{ route('clientes') }}" method="POST">
            @csrf

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('nombre')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            @error('email')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror


            <div class="mb-3">
                <label for="inputNombre" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="inputNombre" name = "nombre" aria-describedby="nombreHelp">
                <div id="nombreHelp" class="form-text">Ingrese su nombre completo</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name = "email"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Ingrese su correo electronico
                </div>


            </div>

            <button type="submit" class="btn btn-primary">Registrar cliente</button>

            <a href="{{ route('clientes.show') }}" class="btn btn-dark ">Ver clientes</a>

          




        </form>
    </div>
@endsection
