var nuevo_tipo_identificacion;
// var table_tipo_identificacion;
$(document).ready(function() {
	nuevo_tipo_identificacion = false;
	opciones_tipo_identificacion("inicializar");
});
function ir_tipo_identificacion(modulo,ir){

	$("#codigo_tipo_identificacion").prop("readonly", true);

	switch (ir) {
		case 'ir_siguiente':
		if ($("#codigo_tipo_identificacion").val().length == 0) {
			ir = "ir_primero";
		}	
		$("#tipo_identificacion-btn-anterior").removeAttr('disabled');
		$('#tipo_identificacion-btn-primero').removeAttr('disabled');	

		break;
		case 'ir_anterior':
		if ($("#codigo_tipo_identificacion").val().length == 0) {
			ir = 'ir_primero';
		}
		$("#tipo_identificacion-btn-siguiente").removeAttr('disabled');
		$('#tipo_identificacion-btn-ultimo').removeAttr('disabled');
		break;	
		case 'ir_ultimo':  	
		$("#tipo_identificacion-btn-anterior").removeAttr('disabled');
		$('#tipo_identificacion-btn-siguiente').attr('disabled','disabled');
		$('#tipo_identificacion-btn-ultimo').attr('disabled','disabled');
		break;
		case 'ir_primero':
		$('#tipo_identificacion-btn-anterior').attr('disabled','disabled');
		$("#tipo_identificacion-btn-siguiente").removeAttr('disabled');
		$('#tipo_identificacion-btn-primero').attr('disabled','disabled');
		break; 
	}

	$id = $("#codigo_tipo_identificacion").val();
	form = $('#form-store-prev_next');   
	url = form.attr('action');
	$.ajax({
		url: url,
		type: 'POST',
		data: { _token:CSRF_TOKEN, id: $id, modulo: modulo,prev_next:ir},
		success: function(response) { 						
			if (response.id == null) {
				if (ir == "ir_siguiente") {
					$('#tipo_identificacion-btn-siguiente').attr('disabled','disabled');
					$('#tipo_identificacion-btn-ultimo').attr('disabled','disabled');
				}else{
					$('#tipo_identificacion-btn-anterior').attr('disabled','disabled');
					$('#tipo_identificacion-btn-primero').attr('disabled','disabled');
				}
			}else{
				$("#codigo_tipo_identificacion").val(response.id);
				$("#nombre_tipo_identificacion").val(response.nombre);
				$("#descripcion_tipo_identificacion").val(response.descripcion);
				$("#tipo_identificacion-btn-guardar").removeAttr('disabled');
				$("#tipo_identificacion-btn-eliminar").removeAttr('disabled');
			}
		},
		error: function(xhr, status) {
			errors(xhr);          
		},
	});
}
function limpiar_campos_tipo_identificaciones(name){	
	$("#codigo_tipo_identificacion").val("");
	$("#nombre_tipo_identificacion").val("");
	$("#descripcion_tipo_identificacion").val("");
}
function opciones_tipo_identificacion(opcion){
	switch(opcion){
		case "inicializar"://--------------------------------------------------------------------------	
			
			//keydown	  
		    $("#codigo_tipo_identificacion").keydown(function(event) {
		        
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
			$("#codigo_tipo_identificacion").keypress(function(event) {
				var keycode = (event.keyCode ? event.keyCode : event.which);
				table_tipo_identificacion.fnFilter('');
					if(keycode == '13'){//por si presionan ENTER					
						opciones_tipo_identificacion("buscar");
					}
				});
		break;
		case "guardar":	//--------------------------------------------------------------------------
		if ($("#nombre_tipo_identificacion").val().length == 0) {
				alert("Campo nombre es obligatorio");
			}else  {
				//Es una edicion o nuevo registro?
					if (nuevo_tipo_identificacion) {//nuevo
						form = $('#form-store-tipo_identificaciones');   
						url = form.attr('action'); 
						$.ajax({
							url: url,
							type: 'POST',
							data: form.serialize(),
							success: function(response) {   
								alert(response.msg);
								opciones_tipo_identificacion("nuevo");
							},
							error: function(xhr, status) {
								errors(xhr);								
							},
						});
					}else{//editar
						form = $('#form-update-tipo_identificaciones');   
						url = form.attr('action').replace(':ID',$("#codigo_tipo_identificacion").val());						
						var data = { _token:CSRF_TOKEN, 
							nombre: $("#nombre_tipo_identificacion").val(), 
							descripcion:$("#descripcion_tipo_identificacion").val() 
						};

						$.ajax({
							url: url,
							type: 'PUT',
							data: data,
							success: function(response) {   
								alert(response.msg);
							},
							error: function(xhr, status) {
								errors(xhr);
							},
						});
					}
				}		
				break;
			case "nuevo"://--------------------------------------------------------------------------
				$("#tipo_identificacion-btn-guardar").removeAttr('disabled');
				$('#tipo_identificacion-btn-eliminar').attr('disabled','disabled');
				$('#tipo_identificacion-btn-anterior').attr('disabled','disabled');
				$('#tipo_identificacion-btn-siguiente').attr('disabled','disabled');			
				$('#tipo_identificacion-btn-primero').attr('disabled','disabled');			
				$('#tipo_identificacion-btn-ultimo').attr('disabled','disabled');

				//busca el ultimi id + 1
				nuevo_tipo_identificacion = true;	
				limpiar_campos_tipo_identificaciones("tipo_identificaciones");
				form = $('#form-create-tipo_identificaciones');   
				url = form.attr('action'); 
				$.ajax({
					url: url,
					type: 'GET',
					data: form.serialize(),
					success: function(response) {   

						$("#codigo_tipo_identificacion").val(response.data);		
						$("#codigo_tipo_identificacion").prop("readonly", true);
						$('#tipo_identificacion-btn-buscar').attr('disabled','disabled');
						$("#nombre_tipo_identificacion").focus(); 
					},
					error: function(xhr, status) {
						errors(xhr);
					},
				});	
				break;
				case "editar"://--------------------------------------------------------------------------
					table_tipo_identificacion.fnFilter('');
					limpiar_campos_tipo_identificaciones("tipo_identificaciones");
					$("#codigo_tipo_identificacion").focus(); 
					$("#codigo_tipo_identificacion").prop("readonly", false);
					$('#tipo_identificacion-btn-buscar').removeAttr('disabled');
					$("#tipo_identificacion-btn-guardar").attr('disabled','disabled');
					$("#tipo_identificacion-btn-eliminar").attr('disabled','disabled');
					$('#tipo_identificacion-btn-anterior').removeAttr('disabled');
					$('#tipo_identificacion-btn-siguiente').removeAttr('disabled');			
					$('#tipo_identificacion-btn-primero').removeAttr('disabled');			
					$('#tipo_identificacion-btn-ultimo').removeAttr('disabled');				
					nuevo_tipo_identificacion = false;			
				break;
				case "buscar"://--------------------------------------------------------------------------
					if ($("#codigo_tipo_identificacion").val().length == 0) {//busca a todos los registros
						$("#codigo_tipo_identificacion").prop("readonly", false);
						$('#tipo_identificacion-btn-buscar').attr('disabled','disabled');
						buscar_tipo_identificaciones("tipo_identificaciones");						
					}else{//busqueda por codigo
						form = $('#form-edit-tipo_identificaciones'); 
						url = form.attr('action').replace(':ID',$("#codigo_tipo_identificacion").val()); 
						$.ajax({
							url: url,
							type: 'GET',
							data: form.serialize(),
							success: function(response) {
								if (response.data != null) {
									$("#codigo_tipo_identificacion").val(response.data.id);
									$("#codigo_tipo_identificacion").prop("readonly", true);
									$("#nombre_tipo_identificacion").val(response.data.nombre);
									$("#descripcion_tipo_identificacion").val(response.data.descripcion);								
									$('#tipo_identificacion-btn-buscar').attr('disabled','disabled');
									$("#tipo_identificacion-btn-eliminar").removeAttr('disabled');
									$("#tipo_identificacion-btn-guardar").removeAttr('disabled');
								}else{					
									alert("Este codigo no existe en la base de datos");
									$("#codigo_tipo_identificacion").focus(); 
								}				
							},
							error: function(xhr, status) {
								errors(xhr);
							},
						});
					}
				break;
				case "eliminar"://--------------------------------------------------------------------------
				if ($("#nombre_tipo_identificacion").val().length == 0) {
					alert("Debe de editar un registro");
				}else  {
					
					if (confirm('Desea eliminar este registro')) {						
						form = $('#form-deletes-tipo_identificaciones');   
						url = form.attr('action').replace(':ID',$("#codigo_tipo_identificacion").val()); 
						$.ajax({
							url: url,
							type: 'DELETE',
							data: form.serialize(),
							success: function(response) {						
								if (response.status == "true") {								
									opciones_tipo_identificacion("editar");
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
				$("#texto-modal-ayuda-tipo_identificaciones").empty();
				$("#texto-modal-ayuda-tipo_identificaciones").append(txt_ayuda("tipo_identificaciones"));
				$("#modal_ayuda_tipo_identificaciones").modal("show");
				break; 

			}
		}

		

