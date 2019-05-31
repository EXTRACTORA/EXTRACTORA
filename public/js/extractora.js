var form;var url;var table = null;var CSRF_TOKEN;
var txt_buscar ="buscar";var txt_nuevo ="nuevo";var txt_editar ="editar";
var txt_eliminar ="eliminar";var txt_guardar ="guardar";var textoAyuda ="ayuda";

$(document).ready( function () { 
    CSRF_TOKEN = $("meta[name='csrf-token']").attr("content"); 




} );



function buscar(name){ //---------------------------------------------------txt_buscar----------------------

 switch(name) {                    
        case 'perfil'://-------------------------------perfil     
            opciones_perfil(txt_buscar);  
        break;
        case 'grupos'://-------------------------------grupos  
            opciones_grupo(txt_buscar);   
        break;
        case 'zonas'://-------------------------------zonas  
            opciones_zona(txt_buscar);   
        break;
        case 'ubicaciones'://--------------------------ubicaciones        
            opciones_ubicacion(txt_buscar);   
        break;
        case 'unidades_medidas'://------------------------unidades_medida        
            opciones_unidades_medida(txt_buscar);   
        break;
        case 'plantaciones'://-----------------------------plantaciones        
            opciones_plantacion(txt_buscar);   
        break;
        case 'actividad_economicas'://-----------------------actividad_economica
            opciones_actividad_economica(txt_buscar);   
        break;
        case 'tipo_identificaciones'://----------------------tipo identificaciones        
            opciones_tipo_identificacion(txt_buscar);   
        break;
        case 'terceros'://----------------------------------terceros       
            opciones_tercero(txt_buscar);   
        break;
    }    
}
function nuevo(name){//---------------------------------------------------txt_nuevo----------------------
    switch(name) {                    
        case 'perfil'://------------------------------perfil     
        opciones_perfil(txt_nuevo);   
        break;
        case 'grupos'://-------------------------------grupos  
        opciones_grupo(txt_nuevo);   
        break;
        case 'zonas'://-------------------------------zonas  
        opciones_zona(txt_nuevo);   
        break;
        case 'ubicaciones'://--------------------------ubicaciones
        opciones_ubicacion(txt_nuevo);   
        break;
        case 'unidades_medidas'://----------------------unidades_medida        
        opciones_unidades_medida(txt_nuevo);   
        break;
        case 'plantaciones'://--------------------------plantaciones        
        opciones_plantacion(txt_nuevo);   
        break;
        case 'actividad_economicas'://-----------------------actividad_economica        
        opciones_actividad_economica(txt_nuevo);   
        break;
        case 'tipo_identificaciones'://----------------------tipo identificaciones        
        opciones_tipo_identificacion(txt_nuevo);   
        break;
        case 'terceros'://----------------------------------terceros       
            opciones_tercero(txt_nuevo);   
        break;
      }   
  } 
 function editar(name){//---------------------------------------------------txt_editar---------------------- 

  switch(name) {                    
        case 'perfil'://-------------------------------perfil     
        opciones_perfil(txt_editar);          
        break;
        case 'grupos'://-------------------------------grupos  
        opciones_grupo(txt_editar);   
        break;
        case 'zonas'://-------------------------------zonas  
        opciones_zona(txt_editar);   
        break;
        case 'ubicaciones'://--------------------------ubicaciones   
        opciones_ubicacion(txt_editar);   
        break;
        case 'unidades_medidas'://----------------------unidades_medida        
        opciones_unidades_medida(txt_editar);   
        break;
        case 'plantaciones'://--------------------------plantaciones        
        opciones_plantacion(txt_editar);   
        break;
        case 'actividad_economicas'://-----------------------actividad_economica  
         opciones_actividad_economica(txt_editar);   
        break;
        case 'tipo_identificaciones'://----------------------tipo identificaciones        
        opciones_tipo_identificacion(txt_editar);   
        break;
        case 'terceros'://----------------------------------terceros       
            opciones_tercero(txt_editar);   
        break;
      }   
  } 
 function eliminar(name){//---------------------------------------------------txt_eliminar----------------------  
  switch(name) {                    
        case 'perfil'://-------------------------------perfil     
        opciones_perfil(txt_eliminar); 
        break;
        case 'grupos'://-------------------------------grupos  
        opciones_grupo(txt_eliminar);   
        break;
        case 'zonas'://-------------------------------zonas  
        opciones_zona(txt_eliminar);   
        break;
        case 'ubicaciones'://--------------------------ubicaciones
        opciones_ubicacion(txt_eliminar);   
        break;
        case 'unidades_medidas'://----------------------unidades_medida        
        opciones_unidades_medida(txt_eliminar);   
        break;
        case 'plantaciones'://--------------------------plantaciones        
        opciones_plantacion(txt_eliminar);   
        break;
        case 'actividad_economicas'://-----------------------actividad_economica        
        opciones_actividad_economica(txt_eliminar);   
        break;
        case 'tipo_identificaciones'://----------------------tipo identificaciones        
        opciones_tipo_identificacion(txt_eliminar);   
        break;
        case 'terceros'://----------------------------------terceros       
            opciones_tercero(txt_eliminar);   
        break;
        }
    } 
 function guardar(name){//---------------------------------------------------txt_guardar----------------------
  switch(name) { 
        case 'perfil'://--------------------------------perfil     
        opciones_perfil(txt_guardar); 
        break;
        case 'grupos'://---------------------------------grupos  
        opciones_grupo(txt_guardar);   
        break;
        case 'zonas'://----------------------------------zonas  
        opciones_zona(txt_guardar);   
        break;
        case 'ubicaciones'://--------------------------ubicaciones
        opciones_ubicacion(txt_guardar);   
        break;
        case 'unidades_medidas'://----------------------unidades_medida        
        opciones_unidades_medida(txt_guardar);   
        break;
        case 'plantaciones'://--------------------------plantaciones        
        opciones_plantacion(txt_guardar);   
        break;
        case 'actividad_economicas'://-----------------------actividad_economica        
        opciones_actividad_economica(txt_guardar);   
        break;
        case 'tipo_identificaciones'://----------------------tipo identificaciones        
        opciones_tipo_identificacion(txt_guardar);   
        break;
        case 'terceros'://----------------------------------terceros       
            opciones_tercero(txt_guardar);   
        break;
        }
    } 
 function ir(modulo,ir){//---------------------------------------------------IR-----------------------
    switch(modulo){
        case "perfil"://------------------------------perfil 
        ir_perfil(modulo,ir);     
        break;        
        case "grupos"://-------------------------------grupos
        ir_grupo(modulo,ir);  
        break;
        case 'zonas'://-------------------------------zonas  
        ir_zona(modulo,ir); 
        break;
        case 'ubicaciones'://--------------------------ubicaciones
        ir_ubicacion(modulo,ir);  
        break;
        case 'unidades_medidas'://----------------------unidades_medida        
        ir_unidades_medida(modulo,ir);   
        break;
        case 'plantaciones'://--------------------------plantaciones        
        ir_plantacion(modulo,ir);   
        break;
        case 'actividad_economicas'://-----------------------actividad_economica  
        ir_actividad_economica(modulo,ir);   
        break;
        case 'tipo_identificaciones'://----------------------tipo identificaciones        
        ir_tipo_identificacion(modulo,ir);   
        break;
        case 'terceros'://----------------------------------terceros       
            ir_tercero(modulo,ir);   
        break;
       }
   }
function ayuda(name){//---------------------------------------------------AYUDA----------------------
    switch(name){
        case "perfil"://------------------------------perfil
        opciones_perfil(textoAyuda);    
        break;
        case "grupos"://-------------------------------grupos
        opciones_grupo(textoAyuda);
        break;
        case 'zonas'://-------------------------------zonas  
        opciones_zona(textoAyuda);         
        break;
        case 'ubicaciones'://--------------------------ubicaciones
        opciones_ubicacion(textoAyuda);   
        break;
        case 'unidades_medidas'://----------------------unidades_medida        
        opciones_unidades_medida(textoAyuda);   
        break;
        case 'plantaciones'://--------------------------plantaciones        
        opciones_plantacion(textoAyuda);   
        break;
        case 'actividad_economicas'://-----------------------actividad_economica        
        opciones_actividad_economica(textoAyuda);   
        break;
        case 'tipo_identificaciones'://----------------------tipo identificaciones        
        opciones_tipo_identificacion(textoAyuda);   
        break;
        case 'terceros'://----------------------------------terceros       
            opciones_tercero(textoAyuda);   
        break;
      }
  } 
function errors(xhr){//---------------------------------------------------ERROR----------------------
    var text_error = jQuery.parseJSON(xhr.responseText);
    var msg = "";
    $.each( text_error, function( key, value ) {
        msg = msg + "\n" + value;                   
    });
    alert(msg);
}
function imprimir(name){}//---------------------------------------------------IMPRIMIR----------------------  