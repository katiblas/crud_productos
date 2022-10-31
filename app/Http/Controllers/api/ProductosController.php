<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualizarProductosRequest;
use App\Http\Requests\GuardarProductosRequest;
use App\Http\Resources\ProductosResource;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::all();
        return ProductosResource::collection($productos);
    }

    public function store(GuardarProductosRequest $request)
    {

        return new ProductosResource(Productos::create($request->all()));
    }


    public function show(Productos $producto)
    {
        return new ProductosResource($producto);
    }



    public function update(ActualizarProductosRequest $request, Productos $producto)
    {
        $producto->update($request->all());
        return new ProductosResource($producto);
    }


    public function destroy(Productos $producto)
    {
        $producto->delete();
        return new ProductosResource($producto);
    }
}
