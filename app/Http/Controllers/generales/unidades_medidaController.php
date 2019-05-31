<?php

namespace Extractora\Http\Controllers\generales;

use Extractora\Http\Controllers\Controller;
use Extractora\Http\Requests\generales\unidades_medidaCreateRequest;
use Extractora\Http\Requests\generales\unidades_medidaUpdateRequest;
use Extractora\modelos\generales\unidades_medida;
use Extractora\clases\notificaciones;
use Illuminate\Http\Request;

class unidades_medidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.generales.unidades_medida.index')->render();   
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
        //enviar el ultimo codigo para crear un nuevo registro

        if (unidades_medida::count() > 0) {
             $codigo = unidades_medida::all()->last()->id;
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
    public function store(unidades_medidaCreateRequest $request)
    {

        $unidades_medida = unidades_medida::create($request->all());
        if (!$unidades_medida) {
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
        $unidades_medidas = unidades_medida::all();
        return response()->json([
            'data' =>$unidades_medidas,
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
        $unidades_medidas = unidades_medida::find($id); 
        return response()->json([      
            'data' =>$unidades_medidas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(unidades_medidaUpdateRequest $request, $id)
    {
       $unidades_medida = unidades_medida::find($id); 
       $unidades_medida->update($request->all());
       if (!$unidades_medida) {
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
        $unidades_medida = unidades_medida::findOrFail($id);
        $unidades_medida->delete();
        return response()->json(['status' => 'true','msg' => 'Registro eliminado correctamente'], 200); 
    }
    catch (\Exception $e) {        
      notificaciones::setError($e->getMessage(),"unidades_medidaController","destroy");
      return  response()->json(['codigo' => $e->errorInfo,'status' => 'false','msg' =>'Error al eliminar este registro'],200);
  }
}
}
