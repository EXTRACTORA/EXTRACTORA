<?php

namespace Extractora\modelos\plantaciones;

use Illuminate\Database\Eloquent\Model;

class plantacion extends Model
{
	public $timestamps = false;
	protected $table = "PLANTACIONES";
	protected $fillable = [
		'id',
		'nombre',
		'hectarea',
		'nrolote',
		'palma',
		'zona_id',
		'grupo_id',
		'ubicacion_id',
		'tercero_factura_id',
		'tercero_encargado_id',
		'tercero_propietario_id',
		'fecha_balamce_masa',
	];


	//Relaciones belongsTo : muchas plantaciones PERTENECE A xxxxxx
	
	// public function zona(){
	// 	return $this->belongsTo(zona::class,'zona_id');
	// }
	// public function grupo(){
	// 	return $this->belongsTo(grupo::class,'grupo_id');
	// }   
	// public function ubicacion(){
	// 	return $this->belongsTo(ubicacion::class,'ubicacion_id');
	// } 
	// public function tipo_proveedor(){
	// 	return $this->belongsTo(tipo_proveedor::class,'tipo_proveedor_id');
	// } 
	// public function tercero_facturacion(){
	// 	return $this->belongsTo(tercero::class,'tercero_factura_id');
	// } 
	// public function tercero_ecargado(){
	// 	return $this->belongsTo(tercero::class,'tercero_encargado_id');
	// } 
	// public function tercero_propietario(){
	// 	return $this->belongsTo(tercero::class,'tercero_propietario_id');
	// } 

	//Relaciones  hasMany : una plantacion tiene muchas postcosecha 

	// public function lote(){
	// 	return $this->hasMany(lote::class);
	// }





	//Relaciones  hasMany : una plantacion tiene muchas postcosecha 
	// public function postcosecha(){
	// 	return $this->hasMany(postcosecha::class);
	// }

    //Relaciones  hasMany : una plantacion tiene muchas calidad de tolva 
	// public function calidadtolva(){
	// 	return $this->hasMany(calidadTolva::class);
	// }
	
}
