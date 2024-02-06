<?php

use App\Http\Resources\ProductoResource;
use App\Models\Categoria;
use App\Models\Location;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//RUTA CREACIÓN DE TOKEN: 
Route::post('/tokens/create', function (Request $request) {
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    return response()->json([
        'token' => $request->user()->createToken($request->email, ['*'], now()->addWeek())->plainTextToken,
        'message' => 'Success'
    ]);
});


// RUTAS DE API
Route::middleware('auth:sanctum')->group(function () {
    // RUTAS INVENTARIO
    Route::get('/inventario', function () {
        return ProductoResource::collection(Producto::paginate(5));
    });

    Route::get('/inventario/{id}', function ($id) {
        return new ProductoResource(Producto::findOrFail($id));
    });

    Route::get('/inventario/categoria/{categoria}', function ($categoria) {
        $categoria = Categoria::where('nombre', $categoria)->first();

        if ($categoria) {
            return ProductoResource::collection(Producto::where('categoria_id', $categoria->id)->paginate(10));
        }

        return response()->json([
            'message' => 'categoria no encontrada'
        ], 401);
    });

    Route::delete('/inventario/{id}', function ($id) {
        if (Producto::findOrFail($id)) {
            Producto::destroy($id);
            return ['message' => 'Producto borrado'];
        }
    });

    Route::post('/inventario', function (Request $request) {
        $producto = new Producto();

        if (isset($request->codigo) && isset($request->modelo) && isset($request->fabricante) && isset($request->descripcion) && isset($request->stock) && isset($request->estado)) {
            $producto->codigo = $request->codigo;
            $producto->modelo = $request->modelo;
            $producto->fabricante = $request->fabricante;
            $producto->descripcion = $request->descripcion;
            $producto->stock = intval($request->stock);
            $producto->estado = $request->estado;
        }

        $producto->imagen = "null";

        if (Categoria::where('id', $request->categoria)->first()) {
            $producto->categoria_id = $request->categoria;
        }

        if (Location::where('id', $request->localizacion)->first()) {
            $producto->location_id = $request->localizacion;
        }

        $producto->save();

        return new ProductoResource($producto);
    });


    // RUTAS CATEGORIA


});
