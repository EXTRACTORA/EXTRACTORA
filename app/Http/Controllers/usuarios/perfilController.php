<?php

namespace Extractora\Http\Controllers\usuarios;

use Extractora\Http\Controllers\Controller;
use Extractora\Http\Requests\usuarios\perfilCreateRequest;
use Extractora\Http\Requests\usuarios\perfilUpdateRequest;
use Extractora\modelos\usuarios\perfil;
use Extractora\clases\notificaciones;
use Illuminate\Http\Request;

class perfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $perfiles = perfil::all();
        // return view('menu.usuarios.perfiles.index', compact('perfiles'))->render();   
        return view('menu.usuarios.perfiles.index')->render();   
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
        //enviar el ultimo codigo para crear un nuevo registro
       if (perfil::count() > 0) {
           $codigo = perfil::all()->last()->id;
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
    public function store(perfilCreateRequest $request)
    {

        $perfil = perfil::create($request->all());
        if (!$perfil) {
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
        $perfiles = perfil::all();
        return response()->json([
            'data' =>$perfiles,
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
        $perfiles = perfil::find($id); 
        return response()->json([      
            'data' =>$perfiles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(perfilUpdateRequest $request, $id)
    {
     $perfil = perfil::find($id); 
     $perfil->update($request->all());
     if (!$perfil) {
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
        $perfil = perfil::findOrFail($id);
        $perfil->delete();
        return response()->json(['status' => 'true','msg' => 'Registro eliminado correctamente'], 200); 
    }
    catch (\Exception $e) {        
      notificaciones::setError($e->getMessage(),"perfilController","destroy");
      return  response()->json(['codigo' => $e->errorInfo,'status' => 'false','msg' =>'Error al eliminar este registro'],200);

  }
}
}
