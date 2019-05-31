<?php

namespace Extractora\Http\Controllers\registros;

use Extractora\Http\Controllers\Controller;
use Extractora\modelos\generales\unidades_medida;
use Extractora\modelos\grupo\grupo;
use Extractora\modelos\plantaciones\plantacion;
use Extractora\modelos\plantaciones\zona;
use Extractora\modelos\terceros\actividad_economica;
use Extractora\modelos\terceros\tercero;
use Extractora\modelos\terceros\tipo_identificacion;
use Extractora\modelos\ubicacion\ubicacion;
use Extractora\modelos\usuarios\perfil;
use Illuminate\Http\Request;

class prev_nextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $respuesta = null;
        switch ($request->modulo) {
            case 'perfil': 
                if (perfil::count() > 0)  {
                       switch ($request->prev_next) {
                        case 'ir_siguiente':
                        $respuesta = perfil::where('id', '>', $request->id)->orderBy('id','asc')->first();
                        break;
                        case 'ir_anterior':
                        $respuesta = perfil::where('id', '<', $request->id)->orderBy('id','desc')->first();
                        break;
                        case 'ir_ultimo':
                        $respuesta = perfil::all()->last();
                        break;
                        case 'ir_primero':
                        $respuesta = perfil::all()->first();
                        break;  
                    }       
                }
            break;  
            case 'grupos':
                if (grupo::count() > 0)  {
                    switch ($request->prev_next) {
                        case 'ir_siguiente':
                        $respuesta = grupo::where('id', '>', $request->id)->orderBy('id','asc')->first();
                        break;
                        case 'ir_anterior':
                        $respuesta = grupo::where('id', '<', $request->id)->orderBy('id','desc')->first();
                        break;
                        case 'ir_ultimo':
                        $respuesta = grupo::all()->last();
                        break;
                        case 'ir_primero':
                        $respuesta = grupo::all()->first();
                        break;  
                    }        
                } 
            break;
            case 'zonas':
                if (zona::count() > 0)  {
                     switch ($request->prev_next) {
                        case 'ir_siguiente':
                        $respuesta = zona::where('id', '>', $request->id)->orderBy('id','asc')->first();
                        break;
                        case 'ir_anterior':
                        $respuesta = zona::where('id', '<', $request->id)->orderBy('id','desc')->first();
                        break;
                        case 'ir_ultimo':
                        $respuesta = zona::all()->last();
                        break;
                        case 'ir_primero':
                        $respuesta = zona::all()->first();
                        break;  
                    }         
                }
            break;
            case 'ubicaciones':
                if (ubicacion::count() > 0)  {
                     switch ($request->prev_next) {
                        case 'ir_siguiente':
                        $respuesta = ubicacion::where('id', '>', $request->id)->orderBy('id','asc')->first();
                        break;
                        case 'ir_anterior':
                        $respuesta = ubicacion::where('id', '<', $request->id)->orderBy('id','desc')->first();
                        break;
                        case 'ir_ultimo':
                        $respuesta = ubicacion::all()->last();
                        break;
                        case 'ir_primero':
                        $respuesta = ubicacion::all()->first();
                        break;  
                    }       
                } 
            break;
            case 'unidades_medidas':
                if (unidades_medida::count() > 0)  {
                    switch ($request->prev_next) {
                        case 'ir_siguiente':
                        $respuesta = unidades_medida::where('id', '>', $request->id)->orderBy('id','asc')->first();
                        break;
                        case 'ir_anterior':
                        $respuesta = unidades_medida::where('id', '<', $request->id)->orderBy('id','desc')->first();
                        break;
                        case 'ir_ultimo':
                        $respuesta = unidades_medida::all()->last();
                        break;
                        case 'ir_primero':
                        $respuesta = unidades_medida::all()->first();
                        break;  
                    }       
                } 
            break; 
            case 'plantaciones':
               if (plantacion::count() > 0)  {
                       switch ($request->prev_next) {
                            case 'ir_siguiente':
                            $respuesta = plantacion::where('id', '>', $request->id)->orderBy('id','asc')->first();
                            break;
                            case 'ir_anterior':
                            $respuesta = plantacion::where('id', '<', $request->id)->orderBy('id','desc')->first();
                            break;
                            case 'ir_ultimo':
                            $respuesta = plantacion::all()->last();
                            break;
                            case 'ir_primero':
                            $respuesta = plantacion::all()->first();
                            break; 
                        }       
                } 
            break;
            case 'actividad_economicas':
                if (actividad_economica::count() > 0)  {
                   switch ($request->prev_next) {
                        case 'ir_siguiente':
                            $respuesta = actividad_economica::where('id', '>', $request->id)->orderBy('id','asc')->first();
                        break;
                        case 'ir_anterior':
                            $respuesta = actividad_economica::where('id', '<', $request->id)->orderBy('id','desc')->first();
                        break;
                        case 'ir_ultimo':
                            $respuesta = actividad_economica::all()->last();
                        break;
                        case 'ir_primero':
                            $respuesta = actividad_economica::all()->first();
                        break; 
                    }       
                } 
            break;
            case 'tipo_identificaciones':
                if (tipo_identificacion::count() > 0)  {
                       switch ($request->prev_next) {
                            case 'ir_siguiente':
                            $respuesta = tipo_identificacion::where('id', '>', $request->id)->orderBy('id','asc')->first();
                            break;
                            case 'ir_anterior':
                            $respuesta = tipo_identificacion::where('id', '<', $request->id)->orderBy('id','desc')->first();
                            break;
                            case 'ir_ultimo':
                            $respuesta = tipo_identificacion::all()->last();
                            break;
                            case 'ir_primero':
                            $respuesta = tipo_identificacion::all()->first();
                            break; 
                        }       
                }  
            break;
            case 'terceros':
                if (tercero::count() > 0)  {
                   switch ($request->prev_next) {
                        case 'ir_siguiente':
                        $respuesta = tercero::where('id', '>', $request->id)->orderBy('id','asc')->first();
                        break;
                        case 'ir_anterior':
                        $respuesta = tercero::where('id', '<', $request->id)->orderBy('id','desc')->first();
                        break;
                        case 'ir_ultimo':
                        $respuesta = tercero::all()->last();
                        break;
                        case 'ir_primero':
                        $respuesta = tercero::all()->first();
                        break; 
                    }       
                } 
            break;
              case '':
             if (0)  {   
                } 
            break;
        }

        return response()->json($respuesta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
