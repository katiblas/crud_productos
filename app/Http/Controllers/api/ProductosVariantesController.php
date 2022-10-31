<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarProductosVariantesRequest;
use App\Http\Requests\GuardarProductosVariantesRequest;
use App\Http\Resources\ProductosVariantesResource;
use App\Models\Productos;
use App\Models\ProductosVariantes;
use Illuminate\Http\Request;

class ProductosVariantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variantes = ProductosVariantes::select("productos_variantes.*", "productos.nombre as nombre_producto")->join("productos", "productos.id", "=", "productos_variantes.producto_id")->get();
        return ProductosVariantesResource::collection($variantes);
    }

    public function store(GuardarProductosVariantesRequest $request)
    {
        $existe = Productos::where("id", $request->producto_id)->get();
        if (count($existe) == 0) {
            return response()->json(["message" => "El producto no existe", "error" => 500]);
        }

        return new ProductosVariantesResource(ProductosVariantes::create($request->all()));
    }


    public function show(ProductosVariantes $variante)
    {
        return new ProductosVariantesResource($variante);
    }


    public function buscarXIdProductos(Request $request, $id)
    {

        $variante = ProductosVariantes::where("producto_id", $id)->get();
        return new ProductosVariantesResource($variante);
    }


    public function update(ActualizarProductosVariantesRequest $request, ProductosVariantes $variante)
    {

        $variante->update($request->all());
        return new ProductosVariantesResource($variante);
    }


    public function destroy(ProductosVariantes $variante)
    {
        $variante->delete();
        return new ProductosVariantesResource($variante);
    }
}
