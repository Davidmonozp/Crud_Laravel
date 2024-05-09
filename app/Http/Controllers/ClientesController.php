<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    public function store(Request $request)
    {
        $id = $request->route('id');
        $request->validate([
            'nombre' => 'required|string|min:3',
            'email' => 'required|email|unique:clientes,email,' . $id,
        ]);
    
        $cliente = new Cliente;

        $cliente->nombre = $request->nombre;
        $cliente->email = $request->email;
        $cliente->save();

        return redirect()->route('clientes')->with('success', 'Cliente creado correctamente');
    }

    public function index()
    {
        
        $clientes = Cliente::all();
        return view('clientes.index', ['clientes' => $clientes]);
    }



    public function show(Request $request)
    {
        // Obtener el valor del filtro por nombre
        $filterValue = $request->input('nombre');

        // Obtener todos los clientes de la base de datos
        $clientes = Cliente::query();

        // Aplicar el filtro por nombre si se proporciona un valor
        if ($filterValue) {
            $clientes->where('nombre', 'LIKE', '%' . $filterValue . '%');
        }

        // Paginar los resultados
        $clientes = $clientes->orderBy('id', 'desc')->paginate(50);

        // Pasar los datos de los clientes a la vista
        return view('clientes.show', ['clientes' => $clientes]);
    }


    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }


    /*public function edit($id){
        $cliente = Cliente::find($id);        
        return view('clientes.edit', compact ('cliente'));
    }*/

    public function update(Request $request, $id)
{
    // Validar los datos de entrada
    $request->validate([
        'nombre' => 'required|string|min:3',
        'email' => 'required|email|unique:clientes,email,' . $id,
    ]);

    // Encontrar el cliente existente
    $cliente = Cliente::findOrFail($id);

    // Actualizar los datos del cliente
    $cliente->nombre = $request->nombre; 
    $cliente->email = $request->email;
    $cliente->save();

    // Redireccionar a la página de detalles del cliente
    return redirect()->route('clientes.show', ['cliente' => $cliente]);
}

    public function destroy(cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.show', ['cliente' => $cliente]);
    }

    }




  //-index para mostrar los clientes
    //-store para guardar un cliente
    //-update-edit para actualizar un administrador
    //-destroy eliminar un administrador
