<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use Illuminate\Http\Request;

class DetallePedidoController extends Controller
{
    public function create(Request $request) //Crear - Actualizar
    {
        if ($request->id == 0) {
            $detallePedido = new DetallePedido();
        } else {
            $detallePedido = DetallePedido::find($request->id);
        }
        $detallePedido->numero_pedido = $request->numero_pedido;
        $detallePedido->fecha_hora = $request->fecha_hora;
        $detallePedido->cliente_id = $request->cliente_id;

        $detallePedido->save();

        //return $detallePedido;
        return "OK";
    }

    public function update(Request $request, $id) // Agregado el parámetro $id
    {
        $detallePedido = DetallePedido::find($id);
        if (!$detallePedido) {
            return response("Pedido no encontrado", 404);
        }

        $detallePedido->numero_pedido = $request->numero_pedido;
        $detallePedido->fecha_hora = $request->fecha_hora;
        $detallePedido->cliente_id = $request->cliente_id;

        $detallePedido->save();

        return "OK";
    }

    public function get($id) // Cambiado el parámetro a $id
    {
        $detallePedido = DetallePedido::find($id);

        return $detallePedido;
    }

    public function list()
    {
        //$pedidos = Pedido::all();
        $detallesPedido = DetallePedido::orderBy('id', 'asc')->get(); //Ordenarlos por id

        return $detallesPedido;
        //return response()->json($pedidos); //Se regresa en json para usar en combo box
    }

    public function delete($id) // Cambiado el parámetro a $id
    {
        $detallePedido = DetallePedido::find($id);
        if (!$detallePedido) {
            return response("Pedido no encontrado", 404);
        }
        $detallePedido->delete();

        return "OK";
    }
}
