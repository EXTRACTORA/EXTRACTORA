var nthTabs;
var form;   
var url;
var title; 
var existe = false


var modulo;
var table_zona;
var table_perfil;
var table_tercero;
var table_plantacion;
var table_actividad_economica;
var table_tipo_identificacion;
var table_paises;
var table_departamentos;
var table_ciudades;





$(document).ready(function() { 

    //cargar todos los modales e inicializar las tablas de cada modal
    form = $('#form-index-ajax');  
    url = form.attr('action'); 
    $.ajax({
        url: url,
        type: 'GET',
        data: form.serialize(),
        success: function(response) {     
            $("#main-modales").append(response);
            int_eventos_tables_zona();
            int_eventos_tables_grupo();
            int_eventos_table_perfil();
            int_eventos_tables_ubicacion();
            int_eventos_tables_plantacion();
            int_eventos_table_actividad_economica();
            int_eventos_tables_tipo_identificacion(); 
            int_eventos_table_tercero();
            int_eventos_table_paises(); 
            int_eventos_table_ciudades();
            int_eventos_table_departamentos();       
            
        },
        error: function(xhr, status) {
            errorAjax(xhr, status);
        },
    });





    tab_seleccionar();

    //inicializacion del main tabs principal
    nthTabs = $("#main-tabs").nthTabs();
    
    $(".open_tab").on('click', function() {

        var form;   
        var url;
        var title; 
        var existe = false
        switch(this.name) {
            //---------------------usuarios--------------------             
            case 'tab-perfiles':            
            form = $('#form-index-perfiles');   
            title ='Perfiles';  
            existe = true;
            break;
            case 'tab-permisos':
            form = $('#form-index-permisos');   
            title ='Permisos'; 
            existe = true; 
            break;
            case 'tab-usuarios':
            form = $('#form-index-usuarios');   
            title ='Usuarios'; 
            existe = true; 
            break;
            //---------------------usuarios-------------------- 
            //---------------------plantaciones----------------         
            case 'tab-grupos':
            form = $('#form-index-grupos');   
            title ='Grupos'; 
            existe = true;
            break;
            case 'tab-zonas':
            form = $('#form-index-zonas');   
            title ='Zonas'; 
            existe = true;
            break;
            case 'tab-ubicaciones':
            form = $('#form-index-ubicaciones');
            title ='Ubicaciones'; 
            existe = true;   
            break;
            case 'tab-plantaciones':
            form = $('#form-index-plantaciones');   
            title ='Plantaciones';
            existe = true; 
            break;
            //---------------------plantaciones---------------- 
            //----------------------vehiculos------------------ 
            case 'tab-tipo-vehiculo':
            form = $('#form-index-tipo_vehiculos');   
            title ='Tipo vehiculos'; 
            existe = true;
            break;
            case 'tab-vehiculos':
            form = $('#form-index-vehiculos');   
            title ='Vehiculos'; 
            existe = true;
            break;          
            //----------------------vehiculos------------------
            //----------------------productos------------------ 
            case 'tab-clase-productos':
            form = $('#form-index-clases_productos');   
            title ='Clases productos'; 
            break;
            case 'tab-productos':
            form = $('#form-index-productos');   
            title ='Productos'; 
            existe = true;
            break;          
            //----------------------productos------------------ 
            //-----------------------tercero------------------- 
            case 'tab-tipo-tercero':
            form = $('#form-index-tipo_terceros');   
            title ='Tipo terceros';
            existe = true; 
            break;
            case 'tab-tercero':
            form = $('#form-index-terceros');   
            title ='Terceros'; 
            existe = true;
            break;  
            case 'tab-tipo-identificacion':
            form = $('#form-index-tipo-identificacion');   
            title ='Tipo identificacion'; 
            existe = true;
            break; 
            case 'tab-actividad-economica':
            form = $('#form-index-actividad-economica');   
            title ='Actividad economica'; 
            existe = true;
            break; 
            //-----------------------tercero-------------------     
            //-----------------------Paradas------------------- 
            case 'tab-tipo-parada':
            form = $('#form-index-tipo_paradas');   
            title ='Tipo paradas'; 
            existe = true;
            break;
            case 'tab-parada':
            form = $('#form-index-paradas');   
            title ='Paradas';
            existe = true; 
            break;          
            //-----------------------Paradas------------------- 
            //-----------------------Equipos------------------- 
            case 'tab-fase-proceso':
            form = $('#form-index-fases_proceso');   
            title ='Fases proceso';
            existe = true; 
            break;
            case 'tab-equipos':
            form = $('#form-index-equipos');   
            title ='Equipos'; 
            existe = true;
            break;          
            //-----------------------Equipos------------------- 
            //-----------------------Generales-------------------   
            case 'tab-unidades-medida':
            form = $('#form-index-unidades_medida');   
            title ='Unidades medida';
            existe = true; 
            break;
            case 'tab-divicion-geografica':
            form = $('#form-index-division_geografica');   
            title ='Division geografica';
            existe = true; 
            break;      
            case 'tab-tipos-identiicacion':
            form = $('#form-index-tipos_identificacion');   
            title ='Tipos identificacion';
            existe = true; 
            break;      
            //-----------------------Generales-------------------
             //-----------------------Sistema-------------------
             case 'tab-errores':
             form = $('#form-index-error');   
             title ='Errores';
             existe = true; 
             break; 
             //-----------------------Sistema-------------------   
             default:
             break;


         }
        //peticion ajax a los controladores para traer el formulario asociado de la tab 
        if (true) {
            url = form.attr('action'); 
            $.ajax({
                url: url,
                type: 'GET',
                data: form.serialize(),
                success: function(response) {             

                    var id = Math.ceil(Math.random() * 1000);
                    nthTabs.addTab({
                        id: "nth-tab-" + id,
                        title: title,
                        content: response,
                        active: true,
                        allowClose: true,
                        location: true,
                        fadeIn: false
                    })

                },
                error: function(xhr, status) {
                    errorAjax(xhr, status);
                },
            });
        }

    }); 

});

//funcion que permite cargar una tab para pruebas 
function tab_seleccionar(){
   form = $('#form-index-terceros'); //en este caso  este formulario 
   title ='terceros';  
   url = form.attr('action'); 
   $.ajax({
    url: url,
    type: 'GET',
    data: form.serialize(),
    success: function(response) {
      var id = Math.ceil(Math.random() * 1000);
      nthTabs.addTab({
        id: "nth-tab-" + id,
        title: title,
        content: response,
        active: true,
        allowClose: true,
        location: true,
        fadeIn: false
    })
  },
  error: function(xhr, status) {
    errorAjax(xhr, status);
},
});


}
function buscar_zonas(mod){
    modulo = mod;
    form = $('#form-show-zonas');   
    url = form.attr('action').replace(':ID',0); 
    table_zona.fnClearTable();
    $.get(url, function(response) {                     
        $.each( response.data, function( key, value ) {
            table_zona.fnAddData([value.id,value.nombre]); 
            $("#modal_zonas").modal("show"); 
        });     
    }).fail(function(xhr, status) {             
        errors(xhr);
    });
}
function buscar_plantaciones(mod){
    modulo = mod;
    form = $('#form-show-plantaciones');   
    url = form.attr('action').replace(':ID',0); 
    table_plantacion.fnClearTable();
    $.get(url, function(response) {                      
       $.each( response.data, function( key, value ) {
           table_plantacion.fnAddData([value.id,value.nombre]);  
           $("#modal_plantaciones").modal("show");  
       });
   }).fail(function(xhr, status) {              
       errors(xhr);
   });
}





function buscar_grupos(mod){
    modulo = mod;
    form = $('#form-show-grupos');   
    url = form.attr('action').replace(':ID',0); 
    table_grupo.fnClearTable();
    $.get(url, function(response) {                     
        $.each( response.data, function( key, value ) {
            table_grupo.fnAddData([value.id,value.nombre]); 
            $("#modal_grupos").modal("show");
        });

    }).fail(function(xhr, status) {             
        errors(xhr);
    });
}


function buscar_ubicaciones(mod){
    modulo = mod;
    form = $('#form-show-ubicaciones');   
    url = form.attr('action').replace(':ID',0); 
    table_ubicacion.fnClearTable();
    $.get(url, function(response) {                     
        $.each( response.data, function( key, value ) {
            table_ubicacion.fnAddData([value.id,value.nombre]);
            $("#modal_ubicaciones").modal("show"); 
        });
    }).fail(function(xhr, status) {             
        errors(xhr);
    });
}
function buscar_tipo_identificaciones(mod){
    modulo = mod;
    form = $('#form-show-tipo-identificacion');   
    url = form.attr('action').replace(':ID',0); 
    table_tipo_identificacion.fnClearTable();
    $.get(url, function(response) {                     
        $.each( response.data, function( key, value ) {
            table_tipo_identificacion.fnAddData([value.id,value.nombre]);
            $("#modal_tipo_identificaciones").modal("show"); 
        });
    }).fail(function(xhr, status) {             
        errors(xhr);
    });
}
function buscar_perfiles(mod){
    modulo = mod;
    form = $('#form-show-perfiles');   
    url = form.attr('action').replace(':ID',0); 
    table_perfil.fnClearTable();
    $.get(url, function(response) {                     
        $.each( response.data, function( key, value ) {
            table_perfil.fnAddData([value.id,value.nombre]);   
        });                                                 
        $("#modal_perfiles").modal("show");
    }).fail(function(xhr, status) {             
        errors(xhr);
    });
}

function buscar_actividad_economica(mod){
    modulo = mod;
    form = $('#form-show-actividad_economicas');   
    url = form.attr('action').replace(':ID',0); 
    table_actividad_economica.fnClearTable();
    $.get(url, function(response) {                     
        $.each( response.data, function( key, value ) {
            table_actividad_economica.fnAddData([value.id,value.nombre]);   
        });                                                 
        $("#modal_actividad_economicas").modal("show");
    }).fail(function(xhr, status) {             
        errors(xhr);
    });
}

function buscar_paises(){

//EN BLANCO CIUDADES
$("#ciudades_tercero").val("");
$("#id_ciudades_tercero").val("");

//EN BLANCO DEPARTAMENTOS
$("#departamentos_tercero").val("");
$("#id_departamentos_tercero").val("");


form = $('#form-index-paises');   
url = form.attr('action'); 
table_paises.fnClearTable();
$.get(url, function(response) {                      
   $.each( response.data, function( key, value ) {
    table_paises.fnAddData([value.id,value.nombre]);  
    $("#modal_paises").modal("show");  
});
}).fail(function(xhr, status) {              
   errors(xhr);
});
}

function buscar_departamentos(){
   $("#ciudades_tercero").val("");
   $("#id_ciudades_tercero").val("");  
   table_departamentos.fnFilter(''); 
   $("#modal_departamentos").modal("show"); 
}
function buscar_ciudades(){
 table_ciudades.fnFilter('');
 $("#modal_ciudades").modal("show"); 
}


function int_eventos_table_ciudades(){
    table_ciudades = $('#table-ciudades').dataTable({"oLanguage": txt_ayuda("lenguaje")});
    //click 
    table_ciudades.on("click","tr", function () {                
        form = $('#form-edit-ciudades');  
        url = form.attr('action').replace(':ID',table_ciudades.fnGetData(this)[0]);
        $.get(url, function(response) {                 
            $("#ciudades_tercero").val(response.data.nombre);
            $("#id_ciudades_tercero").val(response.data.id);                                 
        }).fail(function(xhr, status) {             
            errors(xhr);                
        }); 
        $("#modal_ciudades").modal("hide");
    });
}
function int_eventos_table_paises(){
 table_paises = $('#table-paises').dataTable({"oLanguage": txt_ayuda("lenguaje")});

  //click 
  table_paises.on("click","tr", function () {                
    form = $('#form-edit-paises');  
    url = form.attr('action').replace(':ID',table_paises.fnGetData(this)[0]);
    $.get(url, function(response) {                 
        $("#paises_tercero").val(response.data.nombre);
        $("#id_paises_tercero").val(response.data.id); 


         //llenamos los departamentos asociados       
         form = $('#form-show-departamentos');  
         url = form.attr('action').replace(':ID',response.data.id);
         table_departamentos.fnClearTable();
         $.get(url, function(response) {                 
            $.each( response.data, function( key, value ) {
                table_departamentos.fnAddData([value.id,value.nombre]);               
            });
        }).fail(function(xhr, status) {             
            errors(xhr);                
        }); 

    }).fail(function(xhr, status) {             
        errors(xhr);                
    }); 
    $("#modal_paises").modal("hide");
});
}

function int_eventos_table_departamentos(){
 table_departamentos = $('#table-departamentos').dataTable({"oLanguage": txt_ayuda("lenguaje")});


//  if ( $('#id_departamentos_tercero').val().length == 0)  {
//     alert("seleccione primero un pais");
// }else{  
   // }     


    //click    
    table_departamentos.on("click","tr", function () {                
        form = $('#form-edit-departamentos');  
        url = form.attr('action').replace(':ID',table_departamentos.fnGetData(this)[0]);         
        $.get(url, function(response) {                 
            $("#departamentos_tercero").val(response.data.nombre);
            $("#id_departamentos_tercero").val(response.data.id);


            //llenamos los ciudades asociados
            form = $('#form-show-ciudades');  
            url = form.attr('action').replace(':ID',response.data.id);
            table_ciudades.fnClearTable();         
            $.get(url, function(response) {                 
                $.each( response.data, function( key, value ) {
                    table_ciudades.fnAddData([value.id,value.nombre]);               
                });
            }).fail(function(xhr, status) {             
                errors(xhr);                
            }); 

        }).fail(function(xhr, status) {             
            errors(xhr);                
        }); 
        $("#modal_departamentos").modal("hide");
    });

}

function int_eventos_table_perfil(){
    table_perfil = $('#table-perfiles').dataTable({"oLanguage": txt_ayuda("lenguaje")});
    //click 
    table_perfil.on("click","tr", function () {                
        form = $('#form-edit-perfiles');  
        url = form.attr('action').replace(':ID',table_perfil.fnGetData(this)[0]);
        $.get(url, function(response) { 
            $("#codigo_perfil").prop("readonly", true);                 
            $("#codigo_perfil").val(response.data.id);                      
            $("#nombre_perfil").val(response.data.nombre);
            $("#descripcion_perfil").val(response.data.descripcion);                        
            $('#perfil-btn-buscar').attr('disabled','disabled');
            $("#perfil-btn-guardar").removeAttr('disabled');
            $("#perfil-btn-eliminar").removeAttr('disabled');                           
        }).fail(function(xhr, status) {             
            errors(xhr);                
        }); 
        $("#modal_perfiles").modal("hide");
    }); 
}
function buscar_terceros(mod){
    modulo = mod;
    form = $('#form-show-terceros');   
    url = form.attr('action').replace(':ID',0); 
    table_tercero.fnClearTable();
    $.get(url, function(response) {                     
        $.each( response.data, function( key, value ) {
            table_tercero.fnAddData([value.id,value.nombre1]);   
        });                                                 
        $("#modal_terceros").modal("show");
    }).fail(function(xhr, status) {             
        errors(xhr);
    });
}
function int_eventos_table_tercero(){
    table_tercero = $('#table-terceros').dataTable({"oLanguage": txt_ayuda("lenguaje")});
    //click 
    table_tercero.on("click","tr", function () {                
        form = $('#form-edit-terceros');  
        url = form.attr('action').replace(':ID',table_tercero.fnGetData(this)[0]);
        $.get(url, function(response) { 
            $("#codigo_tercero").prop("readonly", true);                 
            $("#codigo_tercero").val(response.data.id);                      
            $("#nombre_tercero").val(response.data.nombre1);
            // $("#descripcion_tercero").val(response.data.descripcion);                        
            $('#tercero-btn-buscar').attr('disabled','disabled');
            $("#tercero-btn-guardar").removeAttr('disabled');
            $("#tercero-btn-eliminar").removeAttr('disabled');                           
        }).fail(function(xhr, status) {             
            errors(xhr);                
        }); 
        $("#modal_terceros").modal("hide");
    }); 
}
function int_eventos_table_actividad_economica(){
    table_actividad_economica = $('#table-actividad_economicas').dataTable({"oLanguage": txt_ayuda("lenguaje")});
    //click 
    table_actividad_economica.on("click","tr", function () {                
        form = $('#form-edit-actividad_economicas');  
        url = form.attr('action').replace(':ID',table_actividad_economica.fnGetData(this)[0]);
        switch(modulo){//Segun el modulo quien hace la peticion
               case "actividad_economicas"://actividad_economicas--------------------------------------------
               $.get(url, function(response) { 
                $("#codigo_actividad_economica").prop("readonly", true);                 
                $("#codigo_actividad_economica").val(response.data.id);                      
                $("#nombre_actividad_economica").val(response.data.nombre);
                $("#descripcion_actividad_economica").val(response.data.descripcion);                        
                $('#actividad_economica-btn-buscar').attr('disabled','disabled');
                $("#actividad_economica-btn-guardar").removeAttr('disabled');
                $("#actividad_economica-btn-eliminar").removeAttr('disabled'); 
            }).fail(function(xhr, status) {             
                errors(xhr);                
            }); 
            break;
                case "terceros"://tipo_identificaciones--------------------------------------------
                $.get(url, function(response) { 
                     $("#actividad_economica_tercero").val(response.data.nombre); 
                     $("#id_actividad_economica_tercero").val(response.data.id);
                     $("#direccion_tercero").focus(); 
                }).fail(function(xhr, status) {             
                    errors(xhr);                
                }); 
                break;
            }
            $("#modal_actividad_economicas").modal("hide");
        }); 
}

function int_eventos_tables_tipo_identificacion(){
    table_tipo_identificacion = $('#table-tipo_identificacion').dataTable({"oLanguage": txt_ayuda("lenguaje")});
        //click 
        table_tipo_identificacion.on("click","tr", function () {              
            form = $('#form-edit-tipo_identificaciones')
            url = form.attr('action').replace(':ID',table_tipo_identificacion.fnGetData(this)[0]);
              switch(modulo){//Segun el modulo quien hace la peticion 
                     case "zonas"://zonas-----------------------------------------------
                     break;
                        case "tipo_identificaciones"://tipo_identificaciones--------------------------------------------
                        $.get(url, function(response) { 
                          $("#codigo_tipo_identificacion").prop("readonly", true);                  
                          $("#codigo_tipo_identificacion").val(response.data.id);                       
                          $("#nombre_tipo_identificacion").val(response.data.nombre);
                          $("#descripcion_tipo_identificacion").val(response.data.descripcion);                     
                          $('#tipo_identificacion-btn-buscar').attr('disabled','disabled');
                          $("#tipo_identificacion-btn-guardar").removeAttr('disabled');
                          $("#tipo_identificacion-btn-eliminar").removeAttr('disabled');
                      }).fail(function(xhr, status) {             
                        errors(xhr);                
                    }); 
                      break;
                        case "terceros"://tipo_identificaciones--------------------------------------------
                        $.get(url, function(response) { 
                            $("#tipo_identificacion_tercero").val(response.data.nombre); 
                            $("#id_tipo_identificacion_tercero").val(response.data.id);
                            $("#nit_tercero").focus(); 
                        }).fail(function(xhr, status) {             
                            errors(xhr);                
                        }); 
                        break;
                    }
            //ocultar el modal
            $("#modal_tipo_identificaciones").modal("hide"); 
        });
    }




    function int_eventos_tables_grupo(){
        table_grupo = $('#table-grupos').dataTable({"oLanguage": txt_ayuda("lenguaje")});
        //click 
        table_grupo.on("click","tr", function () {              
            form = $('#form-edit-grupos')
            url = form.attr('action').replace(':ID',table_grupo.fnGetData(this)[0]);
            
            switch(modulo){//Segun el modulo quien hace la peticion 
                        case "zonas"://zonas-----------------------------------------------
                        console.log("PLANTACION zonas");
                        break;
                        case "plantaciones"://plantacion-----------------------------------
                        $.get(url, function(response) {
                            $("#txt_plantacion_id_grupo").val(response.data.id); 
                            $("#txt_plantacion_grupo").val(response.data.nombre);
                        }).fail(function(xhr, status) {             
                            errors(xhr);                
                        });      
                        break;
                        case "grupos"://grupos--------------------------------------------
                        $.get(url, function(response) { 
                            $("#codigo_grupo").prop("readonly", true);                  
                            $("#codigo_grupo").val(response.data.id);                       
                            $("#nombre_grupo").val(response.data.nombre);
                            $("#descripcion_grupo").val(response.data.descripcion);                     
                            $('#grupo-btn-buscar').attr('disabled','disabled');
                            $("#grupo-btn-guardar").removeAttr('disabled');
                            $("#grupo-btn-eliminar").removeAttr('disabled');                            
                        }).fail(function(xhr, status) {             
                            errors(xhr);                
                        }); 
                        break;

                    }
            //ocultar el modal
            $("#modal_grupos").modal("hide");           

        }); 

    }

    function int_eventos_tables_ubicacion(){
        table_ubicacion = $('#table-ubicaciones').dataTable({"oLanguage": txt_ayuda("lenguaje")});

        //click 
        table_ubicacion.on("click","tr", function () {
            form = $('#form-edit-ubicaciones');  
            url = form.attr('action').replace(':ID',table_ubicacion.fnGetData(this)[0]);

            switch(modulo){//Segun el modulo quien hace la peticion 
                case "zonas"://zonas-----------------------------------------------
                console.log("PLANTACION zonas");
                break;
                case "plantaciones"://plantacion-----------------------------------
                $.get(url, function(response) {
                    $("#txt_plantacion_id_ubicacion").val(response.data.id); 
                    $("#txt_plantacion_ubicacion").val(response.data.nombre);
                }).fail(function(xhr, status) {             
                    errors(xhr);                
                });      
                break;
                case "ubicaciones"://grupos--------------------------------------------
                $.get(url, function(response) { 
                    $("#codigo_ubicacion").prop("readonly", true);                  
                    $("#codigo_ubicacion").val(response.data.id);                       
                    $("#nombre_ubicacion").val(response.data.nombre);
                    $("#descripcion_ubicacion").val(response.data.descripcion);                     
                    $('#ubicacion-btn-buscar').attr('disabled','disabled');
                    $("#ubicacion-btn-guardar").removeAttr('disabled');
                    $("#ubicacion-btn-eliminar").removeAttr('disabled');                            
                }).fail(function(xhr, status) {             
                    errors(xhr);                
                }); 
                break;
            }
            //ocultar el modal
            $("#modal_ubicaciones").modal("hide");   

        });
    }

//-------------------------------------------------------------------------------PLANTACION
function int_eventos_tables_plantacion(){
    /*Inicializa la tabla plantacion */
    table_plantacion = $('#table-plantaciones').dataTable({"oLanguage": txt_ayuda("lenguaje")});

    /*Evento de la tabla plantacion */
    table_plantacion.on("click","tr", function () { 
        form = $('#form-edit-plantaciones');  
        url = form.attr('action').replace(':ID',table_plantacion.fnGetData(this)[0]);
            switch(modulo){//Segun el modulo quien hace la peticion 
                        case "zonas"://zonas-----------------------------------------------
                        console.log("PLANTACION zonas");
                        break;
                        case "plantaciones"://plantacion-------------------------------------
                        $.get(url, function(response) {
                         $("#codigo_plantacion").prop("readonly", true);                 
                         $("#codigo_plantacion").val(response.data.id);                      
                         $("#nombre_plantacion").val(response.data.nombre);
                         $("#descripcion_plantacion").val(response.data.descripcion);                        
                         $('#plantacion-btn-buscar').attr('disabled','disabled');
                         $("#plantacion-btn-guardar").removeAttr('disabled');
                         $("#plantacion-btn-eliminar").removeAttr('disabled');
                     }).fail(function(xhr, status) {             
                        errors(xhr);                
                    });      
                     break;
                 }
            //ocultar el modal
            $("#modal_plantaciones").modal("hide");
        }); 
}
//-------------------------------------------------------------------------------ZONAS
function int_eventos_tables_zona(){

    /*Inicializa la tabla zona */
    table_zona = $('#table-zonas').dataTable({"oLanguage": txt_ayuda("lenguaje")});
    /*Evento de la tabla zona */
    table_zona.on("click","tr", function () {
       form = $('#form-edit-zonas');  
       url = form.attr('action').replace(':ID',table_zona.fnGetData(this)[0]);
             switch(modulo){//Segun el modulo quien hace la peticion 
                case "zonas"://zonas-----------------------------------------------
                $.get(url, function(response) { 
                    $("#codigo_zona").prop("readonly", true);                   
                    $("#codigo_zona").val(response.data.id);                        
                    $("#nombre_zona").val(response.data.nombre);
                    $("#descripcion_zona").val(response.data.descripcion);                      
                    $('#zona-btn-buscar').attr('disabled','disabled');
                    $("#zona-btn-guardar").removeAttr('disabled');
                    $("#zona-btn-eliminar").removeAttr('disabled');  
                }).fail(function(xhr, status) {             
                   errors(xhr);                
               });
                break;
                case "plantaciones"://plantacion-------------------------------------
                $.get(url, function(response) {
                   $("#txt_plantacion_id_zona").val(response.data.id); 
                   $("#txt_plantacion_zona").val(response.data.nombre);
               }).fail(function(xhr, status) {             
                   errors(xhr);                
               });      
               break;
           }
         //ocultar el modal
         $("#modal_zonas").modal("hide"); 
     }); 

}
