<?php

namespace Extractora\Http\Controllers\plantaciones;

use Extractora\Http\Controllers\Controller;
use Extractora\Http\Requests\ubicacion\ubicacionCreateRequest;
use Extractora\Http\Requests\ubicacion\ubicacionUpdateRequest;
use Extractora\clases\notificaciones;
use Extractora\modelos\ubicacion\ubicacion;
use Illuminate\Http\Request;

class ubicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.plantaciones.ubicaciones.index')->render();         
        
    }

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function create()
  {

        //enviar el ultimo codigo para crear un nuevo registro
     if (ubicacion::count() > 0) {
         $codigo = ubicacion::all()->last()->id;
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
    public function store(ubicacionCreateRequest $request)
    {
        $ubicacion = ubicacion::create($request->all());
        if (!$ubicacion) {
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
        $ubicaciones = ubicacion::all();
        return response()->json([
            'data' =>$ubicaciones,
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
        $ubicaciones = ubicacion::find($id); 
        return response()->json([      
            'data' =>$ubicaciones,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ubicacionUpdateRequest $request, $id)
    {
       $ubicacion = ubicacion::find($id); 
       $ubicacion->update($request->all());
       if (!$ubicacion) {
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
        $ubicacion = ubicacion::findOrFail($id);
        $ubicacion->delete();
        return response()->json(['status' => 'true','msg' => 'Registro eliminado correctamente'], 200); 
    }
    catch (\Exception $e) {        
      notificaciones::setError($e->getMessage(),"ubicacionController","destroy");
      return  response()->json(['codigo' => $e->errorInfo,'status' => 'false','msg' =>'Error al eliminar este registro'],200);
  }
}
}
