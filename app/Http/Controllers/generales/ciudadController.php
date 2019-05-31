<?php

namespace Extractora\Http\Controllers\generales;

use Extractora\Http\Controllers\Controller;
use Extractora\modelos\generales\ciudad;
use Illuminate\Http\Request;

class ciudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $roles = role::nombre($request['nombre'])->orderBy('id', 'ASC')->paginate(8);
       $ciudades = ciudad::all();
        return response()->json([
            'data' =>$ciudades,
        ]);  
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //con este id de pais traer todos los departamentos 
        $ciudades = ciudad::where('departamento_id', $id)->get(); 
        return response()->json([      
        'data' =>$ciudades,
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
        $ciudad = ciudad::find($id); 
        return response()->json([      
            'data' =>$ciudad,
        ]);
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
