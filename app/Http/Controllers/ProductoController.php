<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function create(Request $request) //Crear - Actualizar
    {
        if ($request->id == 0) {
            $producto = new Producto();
        } else {
            $producto = Producto::find($request->id);
        }
        $producto->codigo = $request->codigo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;

        $producto->save();

        //return $producto;
        return "OK";

    }

    public function get(Request $request)
    {
        $producto = Producto::find($request->id);

        return $producto;
    }

    public function list()
    {
        $productos = Producto::all();

        return $productos;
        //return response()->json($productos); //Se regresa en json para usar en combo box
    }

    public function delete(Request $request)
    {
        $producto = Producto::find($request->id);
        $producto->delete();

        return "Ok";
    }
}
