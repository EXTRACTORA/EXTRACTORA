<?php

namespace Extractora\Http\Controllers\plantaciones;


use Extractora\Http\Controllers\Controller;
use Extractora\Http\Requests\plantaciones\plantacionCreateRequest;
use Extractora\Http\Requests\plantaciones\plantacionUpdateRequest;
use Extractora\clases\notificaciones;
use Extractora\modelos\plantaciones\plantacion;
use Illuminate\Http\Request;

class plantacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
     // $lotes = lote::all();
     // return view('menu.plantaciones.plantaciones.index', compact('plantaciones','lotes'));
        $plantaciones = plantacion::all();
        return view('menu.plantaciones.plantaciones.index')->render();       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //enviar el ultimo codigo para crear un nuevo registro
       if (plantacion::count() > 0) {
           $codigo = plantacion::all()->last()->id;
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
    public function store(plantacionCreateRequest $request)
    {
        $plantacion = plantacion::create($request->all());
        if (!$plantacion) {
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
        $plantaciones = plantacion::all();
        return response()->json([
            'data' =>$plantaciones,
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
        $plantaciones = plantacion::find($id); 
        return response()->json([      
            'data' =>$plantaciones,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(plantacionUpdateRequest $request, $id)
    {
       $plantacion = plantacion::find($id); 
       $plantacion->update($request->all());
       if (!$plantacion) {
        return response()->json(['msg' => 'error en actualizar este registro'], 422); 
    }
    return response()->json(['msg' => 'Registro actualizado correctamente'], 200); 

}

    /**  
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
     try {
        $plantacion = plantacion::findOrFail($id);
        $plantacion->delete();
        return response()->json(['status' => 'true','msg' => 'Registro eliminado correctamente'], 200); 
    }
    catch (\Exception $e) {        
      notificaciones::setError($e->getMessage(),"plantacionController","destroy");
      return  response()->json(['codigo' => $e->errorInfo,'status' => 'false','msg' =>'Error al eliminar este registro'],200);
  }
}
}
