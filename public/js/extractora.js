

var nthTabs;
var form;   
var url;
var title; 
var existe = false
$(document).ready(function() { 

    tab_seleccionar();



    nthTabs = $("#main-tabs").nthTabs();



//---------------------------------seleccion de las tab------------------------------------
    // on click perfiles - INDEX
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
            default:
            

        }
        if (true) {
            url = form.attr('action'); 
            $.ajax({
                url: url,
                type: 'GET',
                data: form.serialize(),
                success: function(response) {
                // console.log("response", response.id);

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

//---------------------------------seleccion de las tab------------------------------------
});


function tab_seleccionar(){
   form = $('#form-index-perfiles');   
   title ='Perfiles';  
   existe = true;
   url = form.attr('action'); 
   $.ajax({
    url: url,
    type: 'GET',
    data: form.serialize(),
    success: function(response) {
                // console.log("response", response.id);

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








 // nthTabs = $("#main-tabs").nthTabs();

 //    nthTabs.addTab({
 //        id: 'home',
 //        title: 'Home',
 //        url: "https://www.jqueryscript.net",
 //        active: true,
 //        allowClose: false
 //    });

 //    nthTabs.addTab({
 //        id: 'menu-manage',
 //        title: 'Menu',
 //        active: false,
 //        content: 'Menu Content'
 //    }).addTab({
 //        id: 'role-manage',
 //        title: 'Role',
 //        active: false,
 //        content: 'Role Content'
 //    });

 //    $("#add-tab-content").on("click", function () {
 //        var id = Math.ceil(Math.random() * 1000);
 //        nthTabs.addTab({
 //            id: "nth-tab-" + id,
 //            title: 'Tab-' + id,
 //            content: 'Tab Content ' + id,
 //            active: true,
 //            allowClose: true,
 //            location: true,
 //            fadeIn: false
 //        })
 //    });

 //    $("#add-tab-url").on("click", function () {
 //        var id = Math.ceil(Math.random() * 1000);
 //        nthTabs.addTab({
 //            id: "nth-tab-" + id,
 //            title: 'URL Tab-' + id,
 //            url: "https://www.jqueryscript.net",
 //            active: true,
 //            allowClose: true,
 //            location: false,
 //            fadeIn: true
 //        });
 //    });

 //    $("#add-tabs").on("click", function () {
 //        nthTabs.addTabs([{
 //            id: 'user-manage',
 //            title: 'User',
 //            content: 'User Content'
 //        }, {
 //            id: 'auth-manage',
 //            title: 'Auth',
 //            content: 'Auth Content'
 //        }]);
 //    });

 //    $("#tab-plantacioness").on('click', function() {

 //     var form = $('#form-index');   
 //     var url = form.attr('action'); 
 //     $.ajax({
 //        url: url,
 //        type: 'GET',
 //        data: form.serialize(),
 //        success: function(response) {   
 //            console.log('response index: ', response.msg);
 //        },
 //        error: function(xhr, status) {
 //            errorAjax(xhr, status);
 //        },
 //    });


 // });   