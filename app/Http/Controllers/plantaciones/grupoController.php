<?php

namespace Extractora\Http\Controllers\plantaciones;

use Extractora\Http\Controllers\Controller;
use Extractora\Http\Requests\plantaciones\grupoCreateRequest;
use Extractora\Http\Requests\plantaciones\grupoUpdateRequest;
use Extractora\clases\notificaciones;
use Extractora\modelos\grupo\grupo;
use Illuminate\Http\Request;

class grupoController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
        // $grupos = grupo::all();
        // return view('menu.usuarios.grupos.index', compact('grupos'))->render();   
    return view('menu.plantaciones.grupos.index')->render();   
}

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       //enviar el ultimo codigo para crear un nuevo registro
       if (grupo::count() > 0) {
           $codigo = grupo::all()->last()->id;
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
    public function store(grupoCreateRequest $request)
    {

        $grupo = grupo::create($request->all());
        if (!$grupo) {
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
        $grupos = grupo::all();
        return response()->json([
            'data' =>$grupos,
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
        $grupos = grupo::find($id); 
        return response()->json([      
            'data' =>$grupos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(grupoUpdateRequest $request, $id)
    {
     $grupo = grupo::find($id); 
     $grupo->update($request->all());
     if (!$grupo) {
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
        $grupo = grupo::findOrFail($id);
        $grupo->delete();
        return response()->json(['status' => 'true','msg' => 'Registro eliminado correctamente'], 200); 
    }
    catch (\Exception $e) {        
      notificaciones::setError($e->getMessage(),"grupoController","destroy");
      return  response()->json(['codigo' => $e->errorInfo,'status' => 'false','msg' =>'Error al eliminar este registro'],200);

  }
}
}
