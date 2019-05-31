<?php

namespace Extractora\Http\Controllers\plantaciones;

use Extractora\Http\Controllers\Controller;
use Extractora\Http\Requests\zonas\zonaCreateRequest;
use Extractora\Http\Requests\zonas\zonaUpdateRequest;
use Extractora\clases\notificaciones;
use Extractora\modelos\plantaciones\zona;
use Illuminate\Http\Request;

class zonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('menu.plantaciones.zonas.index')->render();        
  }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
   {
      
         //enviar el ultimo codigo para crear un nuevo registro
         if (zona::count() > 0) {
             $codigo = zona::all()->last()->id;
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
    public function store(zonaCreateRequest $request)
    {
        $zona = zona::create($request->all());
        if (!$zona) {
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
        $zonas = zona::all();
        return response()->json([
            'data' =>$zonas,
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
        $zonas = zona::find($id); 
        return response()->json([      
            'data' =>$zonas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(zonaUpdateRequest $request, $id)
    {
     $zona = zona::find($id); 
     $zona->update($request->all());
     if (!$zona) {
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
        $zona = zona::findOrFail($id);
        $zona->delete();
        return response()->json(['status' => 'true','msg' => 'Registro eliminado correctamente'], 200); 
    }
    catch (\Exception $e) {        
      notificaciones::setError($e->getMessage(),"zonaController","destroy");
      return  response()->json(['codigo' => $e->errorInfo,'status' => 'false','msg' =>'Error al eliminar este registro'],200);
  }
}
}
