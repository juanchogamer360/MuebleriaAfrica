<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $datos['empleados']=Empleados::paginate(5);

        return view('empleados.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');

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

        //$datosEmpelado=request()->all();

        $datosEmpleado=request()->except('_token');

         Empleados::insert($datosEmpleado);

        return response()->json($datosEmpleado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
        return view('empleados.buscar');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//recibimos el id a editar
    {
        //
        $empleado= Empleados::findOrFail($id);//hacemos la busqueda del id en la base de datos y guardamos el registro en la variable

        return view('empleados.edit',compact('empleado'));//regresamos la vista de empleados.edit y enviamos la variable con el registro 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleado=request()->except('_token','_method');
        Empleados::where('id','=',$id)->update($datosEmpleado);

        $empleado= Empleados::findOrFail($id);//hacemos la busqueda del id en la base de datos y guardamos el registro en la variable

        return view('empleados.edit',compact('empleado'));//regresamos la vista de empleados.edit y enviamos la variable con el registro 


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//recibimos solamente el id del registro a eliminar
    {
        //
       Empleados::destroy($id);//eliminamos el registro con el id indicado
       return redirect('empleados');//regresamos a la vista index de empleados
    }
}
