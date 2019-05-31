<?php

namespace Extractora\Http\Controllers\terceros;

use Extractora\Http\Controllers\Controller;
use Extractora\Http\Requests\terceros\actividad_economicaCreateRequest;
use Extractora\Http\Requests\terceros\actividad_economicaUpdateRequest;
use Extractora\modelos\terceros\actividad_economica;
use Extractora\clases\notificaciones;
use Illuminate\Http\Request;

class actividad_economicaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('menu.terceros.actividad_economicas.index')->render();
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
   {      
         //enviar el ultimo codigo para crear un nuevo registro
         if (actividad_economica::count() > 0) {
             $codigo = actividad_economica::all()->last()->id;
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
    public function store(actividad_economicaCreateRequest $request)
    {
        $actividad_economica = actividad_economica::create($request->all());
        if (!$actividad_economica) {
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
        $actividad_economicas = actividad_economica::all();
        return response()->json([
            'data' =>$actividad_economicas,
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
        $actividad_economicas = actividad_economica::find($id); 
        return response()->json([      
            'data' =>$actividad_economicas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(actividad_economicaUpdateRequest $request, $id)
    {
     $actividad_economica = actividad_economica::find($id); 
     $actividad_economica->update($request->all());
     if (!$actividad_economica) {
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
        $actividad_economica = actividad_economica::findOrFail($id);
        $actividad_economica->delete();
        return response()->json(['status' => 'true','msg' => 'Registro eliminado correctamente'], 200); 
    }
    catch (\Exception $e) {        
      notificaciones::setError($e->getMessage(),"actividad_economicaController","destroy");
      return  response()->json(['codigo' => $e->errorInfo,'status' => 'false','msg' =>'Error al eliminar este registro'],200);
  }
}
}
