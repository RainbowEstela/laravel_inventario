<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::paginate(10);
        return view("productos.productos", ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view("productos.create", ["categorias" => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $ruta = $request->file("imagen")->store('public');
        $rutaArray = explode("/", $ruta);
        $imagen = $rutaArray[count($rutaArray) - 1];


        $producto = new Producto();
        $producto->codigo = $request->codigo;
        $producto->modelo = $request->modelo;
        $producto->fabricante = $request->fabricante;
        $producto->descripcion = $request->descripcion;
        $producto->stock = intval($request->stock);
        $producto->estado = $request->estado;
        $producto->categoria_id = $request->categoria;
        $producto->imagen = $imagen;
        $producto->save();

        return redirect()->route('productos.view');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorias = Categoria::all();
        $producto = Producto::where('id', $id)->first();

        return view("productos.edit", ["producto" => $producto, "categorias" => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $productoMod = Producto::where('id', intval($id))->first();


        if ($request->file("imagen")) {
            $ruta = $request->file("imagen")->store('public');
            $rutaArray = explode("/", $ruta);
            $imagen = $rutaArray[count($rutaArray) - 1];

            $productoMod->imagen = $imagen;
        }

        $productoMod->codigo = $request->codigo;
        $productoMod->modelo = $request->modelo;
        $productoMod->fabricante = $request->fabricante;
        $productoMod->descripcion = $request->descripcion;
        $productoMod->stock = intval($request->stock);
        $productoMod->estado = $request->estado;
        $productoMod->categoria_id = $request->categoria;
        $productoMod->save();

        return redirect()->route('productos.view');
    }

    public function locationAssing($idl, $idp)
    {
        $producto = Producto::where('id', intval($idp))->first();

        $producto->location_id = intval($idl);
        $producto->save();

        return redirect()->route('productos.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Producto::destroy($id);

        return redirect()->route('productos.view');
    }
}
