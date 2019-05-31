<?php

namespace Extractora\Http\Controllers\terceros;

use Extractora\Http\Controllers\Controller;
use Extractora\Http\Requests\terceros\tipo_identificacionCreateRequest;
use Extractora\Http\Requests\terceros\tipo_identificacionUpdateRequest;
use Extractora\clases\notificaciones;
use Extractora\modelos\terceros\tipo_identificacion;
use Illuminate\Http\Request;


class tipo_identificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('menu.terceros.tipo_identificacion.index')->render(); 
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
         //enviar el ultimo codigo para crear un nuevo registro
       if (tipo_identificacion::count() > 0) {
           $codigo = tipo_identificacion::all()->last()->id;
           return response()->json([      
            'data' => $codigo + 1,
        ]);
       }
       return response()->json([
        'data' => 1,
    ]);
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tipo_identificacionCreateRequest $request)
    {

        $tipo_identificacion = tipo_identificacion::create($request->all());
        if (!$tipo_identificacion) {
            return response()->json([
                'msg' =>'Error al crear este registro'
            ]); 
        }
        return response()->json([
            'msg' =>'Registro creado correctamente',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_identificaciones = tipo_identificacion::all();
        return response()->json([
            'data' =>$tipo_identificaciones,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_identificaciones = tipo_identificacion::find($id); 
        return response()->json([      
            'data' =>$tipo_identificaciones,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(tipo_identificacionUpdateRequest $request, $id)
    {
       $tipo_identificacion = tipo_identificacion::find($id); 
       $tipo_identificacion->update($request->all());
       if (!$tipo_identificacion) {
        return response()->json(['msg' => 'error en actualizar este registro'], 422); 
    }
    return response()->json(['msg' => 'Registro actualizado correctamente'], 200); 

}

    /**   return response(['msg' => trans('web.errors.duplicate_title')], 422); 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
     try {
        $tipo_identificacion = tipo_identificacion::findOrFail($id);
        $tipo_identificacion->delete();
        return response()->json(['status' => 'true','msg' => 'Registro eliminado correctamente'], 200); 
    }
    catch (\Exception $e) {        
      notificaciones::setError($e->getMessage(),"tipo_identificacionController","destroy");
      return  response()->json(['codigo' => $e->errorInfo,'status' => 'false','msg' =>'Error al eliminar este registro'],200);
  }
}
}
