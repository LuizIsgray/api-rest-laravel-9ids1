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

    public function update(Request $request, $id) // Agregado el parámetro $id
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response("Producto no encontrado", 404);
        }

        $producto->codigo = $request->codigo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;

        $producto->save();

        return "OK";
    }

    public function get($id) // Cambiado el parámetro a $id
    {
        $producto = Producto::find($id);

        return $producto;
    }

    public function list()
    {
        //$productos = Producto::all();
        $productos = Producto::orderBy('id', 'asc')->get(); //Ordenarlos por id

        return $productos;
        //return response()->json($productos); //Se regresa en json para usar en combo box
    }

    public function delete($id) // Cambiado el parámetro a $id
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response("Producto no encontrado", 404);
        }
        $producto->delete();

        return "OK";
    }
}
