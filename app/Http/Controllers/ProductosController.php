<?php

namespace App\Http\Controllers;

use App\Productos;
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
        //
        $datos['productos']=Productos::paginate(5);

        return view('productos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosProducto=request()->all();

        $datosProducto=request()->except('_token');

        if($request->hasFile('foto')){
             

            $datosProducto['foto']=$request->file('foto')->store('uploads','public');
        }

         Productos::insert($datosProducto);

        return response()->json($datosProducto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
        return view('productos.buscar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($idProducto)//recibimos el id a editar
    {
        //
        $producto = Productos::where('idProducto',$idProducto)->firstOrFail();//buscamos el registro con el id recibido en la url y lo guardamos en la variable
       // $producto = Productos::where('idProducto',$idProducto);

        return view('productos.edit',compact('producto'));//retorna la vista de productos.edit + el registro encontrado
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idProducto)
    {
        //
        $datosProducto=request()->except('_token','_method');
        Productos::where('idProducto','=',$idProducto)->update($datosProducto);

        $producto = Productos::where('idProducto',$idProducto)->firstOrFail();//buscamos el registro con el id recibido en la url y lo guardamos en la variable
        // $producto = Productos::where('idProducto',$idProducto);
 
         return view('productos.edit',compact('producto'));//retorna la vista de productos.edit + el registro encontrado
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($idProducto)//recibimos el id a eliminar
    {
    
       $producto = Productos::where('idProducto',$idProducto);//buscamos el registro con el id indicado y lo guardamos en la variable
       $producto->delete();//eliminamos el registro guardado en la variable
       return redirect('productos');//regresamos a la vista de productos(index)
    }
}
