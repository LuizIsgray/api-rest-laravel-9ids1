<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function create(Request $request) //Crear - Actualizar
    {
        if ($request->id == 0) {
            $cliente = new Cliente();
        } else {
            $cliente = Cliente::find($request->id);
        }
        $cliente->nombre = $request->nombre;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->ubicacion_latitud = $request->ubicacion_latitud;
        $cliente->ubicacion_longitud = $request->ubicacion_longitud;

        $cliente->save();

        //return $cliente;
        return "OK";

    }

    public function update(Request $request, $id) // Agregado el parámetro $id
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response("Cliente no encontrado", 404);
        }

        $cliente->nombre = $request->nombre;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->ubicacion_latitud = $request->ubicacion_latitud;
        $cliente->ubicacion_longitud = $request->ubicacion_longitud;

        $cliente->save();

        return "OK";
    }

    public function get($id) // Cambiado el parámetro a $id
    {
        $cliente = Cliente::find($id);

        return $cliente;
    }

    public function list()
    {
        //$clientes = cliente::all();
        $clientes = Cliente::orderBy('id', 'asc')->get(); //Ordenarlos por id

        return $clientes;
        //return response()->json($clientes); //Se regresa en json para usar en combo box
    }

    public function delete($id) // Cambiado el parámetro a $id
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response("Cliente no encontrado", 404);
        }
        $cliente->delete();

        return "OK";
    }
}
