var nuevo_tercero;
var  telefonos= [];
var  correos= [];

$(document).ready(function() {
	nuevo_tercero = false;
	opciones_tercero("inicializar");
	$( "#tabs-contacto" ).tabs();
	// contactos("telefonos");
	// contactos("correos");

	$("#nombre_tercero").focus();
	//evento que captura las pestaña que esta activa
	$("#tabs-contacto").on( "tabsactivate", function( event, ui ) {
		switch($("#tabs-contacto").tabs( "option", "active" )){
			case 0:
			$("#nombre_tercero").focus();
			break;
			case 1:			
			$("#direccion_tercero").focus();
			break;
			case 2:			
			break;
			case 3:
			$("#descripcion_tercero").focus();
			break;

		}

	} );


});


function isValidEmailAddress(emailAddress) {
	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	return pattern.test(emailAddress);
};
function ir_tercero(modulo,ir){

	$("#codigo_tercero").prop("readonly", true);

	switch (ir) {
		case 'ir_siguiente':
		if ($("#codigo_tercero").val().length == 0) {
			ir = "ir_primero";
		}	
		$("#tercero-btn-anterior").removeAttr('disabled');
		$('#tercero-btn-primero').removeAttr('disabled');	

		break;
		case 'ir_anterior':
		if ($("#codigo_tercero").val().length == 0) {
			ir = 'ir_primero';
		}
		$("#tercero-btn-siguiente").removeAttr('disabled');
		$('#tercero-btn-ultimo').removeAttr('disabled');
		break;	
		case 'ir_ultimo':  	
		$("#tercero-btn-anterior").removeAttr('disabled');
		$('#tercero-btn-siguiente').attr('disabled','disabled');
		$('#tercero-btn-ultimo').attr('disabled','disabled');
		break;
		case 'ir_primero':
		$('#tercero-btn-anterior').attr('disabled','disabled');
		$("#tercero-btn-siguiente").removeAttr('disabled');
		$('#tercero-btn-primero').attr('disabled','disabled');
		break; 
	}

	$id = $("#codigo_tercero").val();
	form = $('#form-store-prev_next');   
	url = form.attr('action');
	$.ajax({
		url: url,
		type: 'POST',
		data: { _token:CSRF_TOKEN, id: $id, modulo: modulo,prev_next:ir},
		success: function(response) { 						
			if (response.id == null) {
				if (ir == "ir_siguiente") {
					$('#tercero-btn-siguiente').attr('disabled','disabled');
					$('#tercero-btn-ultimo').attr('disabled','disabled');
				}else{
					$('#tercero-btn-anterior').attr('disabled','disabled');
					$('#tercero-btn-primero').attr('disabled','disabled');
				}
			}else{
				$("#codigo_tercero").val(response.id);
				$("#nombre_tercero").val(response.nombre1);
				$("#descripcion_tercero").val(response.descripcion);
				$("#tercero-btn-guardar").removeAttr('disabled');
				$("#tercero-btn-eliminar").removeAttr('disabled');
			}
		},
		error: function(xhr, status) {
			errors(xhr);          
		},
	});
}
function limpiar_campos_terceros(name){	
	$("#codigo_tercero").val("");
	$("#nombre_tercero").val("");
	$("#descripcion_tercero").val("");
}
function opciones_tercero(opcion){
	switch(opcion){
		case "inicializar"://--------------------------------------------------------------------------	
			//keydown	  
			$("#codigo_tercero").keydown(function(event) {		        
		        // 8 = backspace / delete, 9 = tab  13= enter
		        if (  event.keyCode == 8  ||event.keyCode == 13)    {
		        }
		        else {
		        	if (event.keyCode < 95) {
		        		if (event.keyCode < 48 || event.keyCode > 57) {
		        			event.preventDefault();
		        		}
		        	} 
		        	else {
		        		if (event.keyCode < 96 || event.keyCode > 105) {
		        			event.preventDefault();
		        		}
		        	}
		        }
		    });
			//keypress
			$("#codigo_tercero").keypress(function(event) {
				var keycode = (event.keyCode ? event.keyCode : event.which);
				table_tercero.fnFilter('');
					if(keycode == '13'){//por si presionan ENTER					
						opciones_tercero("buscar");
					}
				});	
			break;
			case "guardar":	//--------------------------------------------------------------------------
			
			
			// if (isValidEmailAddress(emailAddress)) {

			// }else{

			// }





			// if ($("#nombre_tercero").val().length == 0) {
			// 	alert("Campo nombre es obligatorio");
			// }else  {
				//Es una edicion o nuevo registro?
					if (nuevo_tercero) {//nuevo
						

						//correos
						var  envio_correos= [];
						$.each( correos, function( key, value ) {				
							envio_correos.push(value.val());
						});

						//telefonos
						var  envio_telefonos= [];
						$.each( telefonos, function( key, value ) {				
							envio_telefonos.push(value.val());
						});

						form = $('#form-store-terceros');   
						url = form.attr('action'); 
						var data = form.serialize();


						$.ajax({
							url: url+'?'+data,
							type: 'POST',
							data:{correos:envio_correos,telefonos:envio_telefonos},
							success: function(response) { 						
								console.log("response", response);
								alert(response.msg);
								// opciones_tercero("nuevo");
							},
							error: function(xhr, status) {
								console.log("status", status);
								errors(xhr);								
							},
						});
					}else{//editar
						form = $('#form-update-terceros');   
						url = form.attr('action').replace(':ID',$("#codigo_tercero").val());						
						var data = { _token:CSRF_TOKEN, 
							nombre: $("#nombre_tercero").val(), 
							descripcion:$("#descripcion_tercero").val() 
						};

						$.ajax({
							url: url,
							type: 'PUT',
							data: data,
							success: function(response) {   
								alert(response.msg);
							},
							error: function(xhr, status) {
								console.los(status);
								errors(xhr);
							},
						});
					}
					
					break;
			case "nuevo":	//--------------------------------------------------------------------------
			$("#tercero-btn-guardar").removeAttr('disabled');
			$('#tercero-btn-eliminar').attr('disabled','disabled');
			$('#tercero-btn-anterior').attr('disabled','disabled');
			$('#tercero-btn-siguiente').attr('disabled','disabled');			
			$('#tercero-btn-primero').attr('disabled','disabled');			
			$('#tercero-btn-ultimo').attr('disabled','disabled');

				//busca el ultimi id + 1
				nuevo_tercero = true;	
				limpiar_campos_terceros("terceros");
				form = $('#form-create-terceros');   
				url = form.attr('action'); 
				$.ajax({
					url: url,
					type: 'GET',
					data: form.serialize(),
					success: function(response) {   

						$("#codigo_tercero").val(response.data);		
						$("#codigo_tercero").prop("readonly", true);
						$('#tercero-btn-buscar').attr('disabled','disabled');
						$("#nombre_tercero").focus(); 
					},
					error: function(xhr, status) {
						errors(xhr);
					},
				});	
				break;
				case "editar"://--------------------------------------------------------------------------
				table_tercero.fnFilter('');
				limpiar_campos_terceros("terceros");
				$("#codigo_tercero").focus(); 
				$("#codigo_tercero").prop("readonly", false);
				$('#tercero-btn-buscar').removeAttr('disabled');
				$("#tercero-btn-guardar").attr('disabled','disabled');
				$("#tercero-btn-eliminar").attr('disabled','disabled');
				$('#tercero-btn-anterior').removeAttr('disabled');
				$('#tercero-btn-siguiente').removeAttr('disabled');			
				$('#tercero-btn-primero').removeAttr('disabled');			
				$('#tercero-btn-ultimo').removeAttr('disabled');				
				nuevo_tercero = false;			
				break;
				case "buscar"://--------------------------------------------------------------------------

					if ($("#codigo_tercero").val().length == 0) {//busca a todos los registros
						$('#tercero-btn-buscar').attr('disabled','disabled');
						$("#codigo_tercero").prop("readonly", false);
						buscar_terceros("terceros");						
					}else{//busqueda por codigo
						form = $('#form-edit-terceros'); 
						url = form.attr('action').replace(':ID',$("#codigo_tercero").val()); 
						$.ajax({
							url: url,
							type: 'GET',
							data: form.serialize(),
							success: function(response) {
								if (response.data != null) {
									$("#codigo_tercero").val(response.data.id);
									$("#codigo_tercero").prop("readonly", true);
									$("#nombre_tercero").val(response.data.nombre1);
									// $("#descripcion_tercero").val(response.data.descripcion);								
									$('#tercero-btn-buscar').attr('disabled','disabled');
									$("#tercero-btn-eliminar").removeAttr('disabled');
									$("#tercero-btn-guardar").removeAttr('disabled');
								}else{					
									alert("Este codigo no existe en la base de datos");
									$("#codigo_tercero").focus(); 
								}				
							},
							error: function(xhr, status) {
								errors(xhr);
							},
						});
					}
					break;

				case "eliminar"://--------------------------------------------------------------------------
				if ($("#nombre_tercero").val().length == 0) {
					alert("Debe de editar un registro");
				}else  {
					
					if (confirm('Desea eliminar este registro')) {						
						form = $('#form-deletes-terceros');   
						url = form.attr('action').replace(':ID',$("#codigo_tercero").val()); 
						$.ajax({
							url: url,
							type: 'DELETE',
							data: form.serialize(),
							success: function(response) {						
								if (response.status == "true") {								
									opciones_tercero("editar");
									alert(response.msg);
								}else{
									alert(response.msg +" codigo: "+response.codigo[0]);
								}
							},
							error: function(xhr, status) {
								errors(xhr);
							},
						});
					} 
				}
				break;
				case "ayuda"://--------------------------------------------------------------------------
				$("#texto-modal-ayuda-terceros").empty();
				$("#texto-modal-ayuda-terceros").append(txt_ayuda("terceros"));
				$("#modal_ayuda_terceros").modal("show");
				break; 

			}
		}


		function contactos(request){

			var type = "text";
			if (request == "telefonos") {
				type = "number";
			}
			var id = Math.ceil(Math.random() * 1000);
			var input = "<div class='form-group'><div class='col-sm-8'>"
			+"<input id=input_"+request+id+" type='"+type+"' class='form-control' autocomplete='off'></div>"
			+"<div class='col-sm-1'>"
			+"<a href='javascript:void(0)'  onclick='delete_"+request+"("+request+id+")' title='Adicionar' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></a>"
			+"</button></div></div>";
			var aux = false;
			switch (request) {
				case"correos":				
				$.each( correos, function( key, value ) {						
					if (value.val().length == 0)  {
						aux = true;
						input = value;	
					}else if (!isValidEmailAddress(value.val())) {							
						alert("No cumple con el formato de un correo electronico,\n Intente con este  ejemplo: micorreo@mail.com");
						aux = true;
						input = value;	
					}							
				});

				if (!aux) {
					$("#tblAppendGrid-correo").append(
						'<tr id='+request+id+'>'
						+'<td>'+input+'</td>'
						+'</tr>');
					$("#input_"+request+id).focus();
					correos.push($("#input_"+request+id));
				}else{
					input.focus();
				}				
				break;
				case"telefonos":
				$.each( telefonos, function( key, value ) {						
					if (value.val().length == 0)  {
						aux = true;
						input = value;	
					}						
				});
				if (!aux) {
					$("#tblAppendGrid-telefono").append(
						'<tr id='+request+id+'>'
						+'<td>'+input+'</td>'
						+'</tr>');
					$("#input_"+request+id).focus();
					telefonos.push($("#input_"+request+id));
				}else{
					input.focus();
				}
				break;
			}			

		}


		function delete_correos(id){
			$(id).remove();
			var itemtoRemove = $(id);
			//elimina elemento
			correos.splice($.inArray(itemtoRemove, correos), 1);


		}
		function delete_telefonos(id){
			$(id).remove();
			var itemtoRemove = $(id);
			//elimina elemento del array
			telefonos.splice($.inArray(itemtoRemove, telefonos), 1);
		}

		function imprimir_correos(){
			$.each( correos, function( key, value ) {
				console.log("value", value);
			})
		}