<?php

namespace Extractora\Http\Controllers\terceros;

use Extractora\Http\Controllers\Controller;
use Extractora\Http\Requests\terceros\terceroCreateRequest;
use Extractora\Http\Requests\terceros\terceroUpdateRequest;
use Extractora\clases\notificaciones;
use Extractora\modelos\terceros\teLefono;
use Extractora\modelos\terceros\tercero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class terceroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.terceros.terceros.index')->render();        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    * */
    public function create()
    {

         //enviar el ultimo codigo para crear un nuevo registro
       if (tercero::count() > 0) {
           $codigo = tercero::all()->last()->id;
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
    public function store(terceroCreateRequest $request)
    {


        try {
                DB::transaction(function () use ($request){

                     $tercero = tercero::create([
                         'nit'=>$request->nit,
                         'codigo_verificacion'=>$request->codigo_verificacion,
                         'estado'=>($request->input('estado')) ? true : false, 
                         'nombre1'=>$request->nombre1,
                         'nombre2'=>$request->nombre2,
                         'apellido1'=>$request->apellido1,
                         'apellido2'=>$request->apellido2,
                         'tipo_identificacion_id'=>$request->tipo_identificacion_id,
                         'actividad_economica_id'=>$request->actividad_economica_id,   
                         'descripcion'=>$request->descripcion,
                     ]); 

                    //se guardan la direccion 
                     $direccion =  $tercero->direccion()->create([
                         'ciudad_id'=>$request->ciudad_id,
                         'departamento_id'=>$request->departamento_id,
                         'pais_id'=>$request->pais_id, 
                         'direccion'=>$request->direccion,        
                     ]);

                    //se guardan los telefonos 
                     if (!empty($request['telefonos'])) {
                            foreach ($request['telefonos'] as $telefono) { 
                             $tercero->teLefono()->create([
                                'numero'=>floatval($telefono),

                            ]);      
                         }
                     }

                    //se guardan los correos 
                     if (!empty($request['correos'])) {
                        foreach ($request['correos'] as $correo) { 
                            $tercero->correo()->create([
                                'nombre'=>$correo,
                            ]);             
                        }
                    }

                    return response()->json([
                        'msg' =>'Registro creado correctamente',
                    ]);
                });
            }catch (\Exception $e) {  
                    // NotificacionesAdmin::sentNotificacion("Error al completar la transaccion de guardar una POSTCOSECHA erro: ".$e); 
                return response()->json( $e, 500);
            }
            // return response()->json([
            //     'msg' =>'Error al crear este registro'
            // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $terceros = tercero::all();
        return response()->json([
            'data' =>$terceros,
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
        $terceros = tercero::find($id); 
        return response()->json([      
            'data' =>$terceros,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(terceroUpdateRequest $request, $id)
    {
       $tercero = tercero::find($id); 
       $tercero->update($request->all());
       if (!$tercero) {
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
        $tercero = tercero::findOrFail($id);
        $tercero->delete();
        return response()->json(['status' => 'true','msg' => 'Registro eliminado correctamente'], 200); 
    }
    catch (\Exception $e) {        
      notificaciones::setError($e->getMessage(),"terceroController","destroy");
      return  response()->json(['codigo' => $e->errorInfo,'status' => 'false','msg' =>'Error al eliminar este registro'],200);
  }
}
}
