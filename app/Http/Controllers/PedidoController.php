<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function create(Request $request) //Crear - Actualizar
    {
        if ($request->id == 0) {
            $pedido = new Pedido();
        } else {
            $pedido = Pedido::find($request->id);
        }
        $pedido->numero_pedido = $request->numero_pedido;
        $pedido->fecha_hora = $request->fecha_hora;
        $pedido->cliente_id = $request->cliente_id;

        $pedido->save();

        //return $pedido;
        return $pedido;
    }

    public function update(Request $request, $id) // Agregado el parámetro $id
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response("Pedido no encontrado", 404);
        }

        $pedido->numero_pedido = $request->numero_pedido;
        $pedido->fecha_hora = $request->fecha_hora;
        $pedido->cliente_id = $request->cliente_id;

        $pedido->save();

        return "OK Actualizado: $pedido";
    }

    public function get($id) // Cambiado el parámetro a $id
    {
        $pedido = Pedido::with('cliente')->find($id);

        return $pedido;
    }

    public function list()
    {
        //$pedidos = Pedido::all();

        //Cargar el modelo de clientes llamando la funcion "clientes" del modelo
        $pedidos = Pedido::with('cliente')->orderBy('id', 'asc')->get();

        //$pedidos = Pedido::orderBy('id', 'asc')->get(); //Ordenarlos por id

        return $pedidos;
        //return response()->json($pedidos); //Se regresa en json para usar en combo box
    }

    public function delete($id) // Cambiado el parámetro a $id
    {
        $pedido = Pedido::find($id);
        if (!$pedido) {
            return response("Pedido no encontrado", 404);
        }
        $pedido->delete();

        return "OK";
    }
}
