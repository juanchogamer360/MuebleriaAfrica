<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $datos['productos']=Productos::paginate(5);//guardamos en la variable los productos de la BD paginados de 5 en 5

        return view('productos.index',$datos);//regresamos la vista index con todos los productos encontrados
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productos.create');//regresamos la vista para crear usuarios
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

        $datosProducto=request()->except('_token');//recibimos los datos del producto excepto el token

        if($request->hasFile('foto')){//si en los datos del producto hay una foto...
             

            $datosProducto['foto']=$request->file('foto')->store('uploads','public');//guardamos la foto en la carpeta uploads
        }

         Productos::insert($datosProducto);//insertamos todos los datos en la BD

        return response()->json($datosProducto);//mostramos en pantalla los datos que se ingresaron
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
    public function update(Request $request, $idProducto)//esta funcion  se manda llamar con el metodo "PATCH"
    {
        //
        $datosProducto=request()->except('_token','_method');//guardamos todos los datos del producto enviado por el id de la url excepto el token y el metodo

        if($request->hasFile('foto')){
             
            $producto = Productos::where('idProducto',$idProducto)->firstOrFail();//buscamos el registro con el id recibido en la url y lo guardamos en la variable

            Storage::delete('public/'.$producto->foto);//eliminamos la foto antigua antes del update

            $datosProducto['foto']=$request->file('foto')->store('uploads','public');//poner la nueva fotografia en la carpeta uploads
        }

        Productos::where('idProducto','=',$idProducto)->update($datosProducto);//actualizamos los datos dentro de la BD con los nuevos datos que el usuario cambio

        $producto = Productos::where('idProducto',$idProducto)->firstOrFail();//buscamos el registro con el id recibido en la url y lo guardamos en la variable
 
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
