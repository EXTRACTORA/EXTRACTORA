var nuevo_ubicacion;
var table_ubicacion;
$(document).ready(function() {
	nuevo_ubicacion = false;
	opciones_ubicacion("inicializar");
});
function ir_ubicacion(modulo,ir){

	$("#codigo_ubicacion").prop("readonly", true);

	switch (ir) {
		case 'ir_siguiente':
		if ($("#codigo_ubicacion").val().length == 0) {
			ir = "ir_primero";
		}	
		$("#ubicacion-btn-anterior").removeAttr('disabled');
		$('#ubicacion-btn-primero').removeAttr('disabled');	
		break;
		case 'ir_anterior':
		if ($("#codigo_ubicacion").val().length == 0) {
			ir = 'ir_primero';
		}
		$("#ubicacion-btn-siguiente").removeAttr('disabled');
		$('#ubicacion-btn-ultimo').removeAttr('disabled');
		break;	
		case 'ir_ultimo':  	
		$("#ubicacion-btn-anterior").removeAttr('disabled');
		$('#ubicacion-btn-siguiente').attr('disabled','disabled');
		$('#ubicacion-btn-ultimo').attr('disabled','disabled');
		break;
		case 'ir_primero':
		$('#ubicacion-btn-anterior').attr('disabled','disabled');
		$("#ubicacion-btn-siguiente").removeAttr('disabled');
		$('#ubicacion-btn-primero').attr('disabled','disabled');
		break; 
	}

	$id = $("#codigo_ubicacion").val();
	form = $('#form-store-prev_next');   
	url = form.attr('action');
	$.ajax({
		url: url,
		type: 'POST',
		data: { _token:CSRF_TOKEN, id: $id, modulo: modulo,prev_next:ir},
		success: function(response) { 						
			if (response.id == null) {
				if (ir == "ir_siguiente") {
					$('#ubicacion-btn-siguiente').attr('disabled','disabled');
					$('#ubicacion-btn-ultimo').attr('disabled','disabled');
				}else{
					$('#ubicacion-btn-anterior').attr('disabled','disabled');
					$('#ubicacion-btn-primero').attr('disabled','disabled');
				}
			}else{
				$("#codigo_ubicacion").val(response.id);
				$("#nombre_ubicacion").val(response.nombre);
				$("#descripcion_ubicacion").val(response.descripcion);
				$("#ubicacion-btn-guardar").removeAttr('disabled');
				$("#ubicacion-btn-eliminar").removeAttr('disabled');
			}
		},
		error: function(xhr, status) {
			errors(xhr);          
		},
	});
}
function limpiar_campos_ubicaciones(name){	
	$("#codigo_ubicacion").val("");
	$("#nombre_ubicacion").val("");
	$("#descripcion_ubicacion").val("");
}
function opciones_ubicacion(opcion){
	switch(opcion){
		case "inicializar"://--------------------------------------------------------------------------
			//keypress
			$("#codigo_ubicacion").keypress(function(event) {
				var keycode = (event.keyCode ? event.keyCode : event.which);
				table_ubicacion.fnFilter('');
						if(keycode == '13'){//por si presionan ENTER					
							opciones_ubicacion("buscar");
						}
					});
			$("#codigo_ubicacion").focus(); 
			break;
			case "guardar":	//--------------------------------------------------------------------------
			if ($("#nombre_ubicacion").val().length == 0) {
				alert("Campo nombre es obligatorio");
			}else  {
				//Es una edicion o nuevo registro?
					if (nuevo_ubicacion) {//nuevo
						form = $('#form-store-ubicaciones');   
						url = form.attr('action'); 
						$.ajax({
							url: url,
							type: 'POST',
							data: form.serialize(),
							success: function(response) {   
								alert(response.msg);
								opciones_ubicacion("nuevo");
							},
							error: function(xhr, status) {
								errors(xhr);								
							},
						});
					}else{//editar
						form = $('#form-update-ubicaciones');   
						url = form.attr('action').replace(':ID',$("#codigo_ubicacion").val());						
						var data = { _token:CSRF_TOKEN, 
							nombre: $("#nombre_ubicacion").val(), 
							descripcion:$("#descripcion_ubicacion").val() 
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
			case "nuevo":	//--------------------------------------------------------------------------
				$("#ubicacion-btn-guardar").removeAttr('disabled');
				$('#ubicacion-btn-eliminar').attr('disabled','disabled');
				$('#ubicacion-btn-anterior').attr('disabled','disabled');
				$('#ubicacion-btn-siguiente').attr('disabled','disabled');			
				$('#ubicacion-btn-primero').attr('disabled','disabled');			
				$('#ubicacion-btn-ultimo').attr('disabled','disabled');

				//busca el ultimi id + 1
				nuevo_ubicacion = true;	
				limpiar_campos_ubicaciones("ubicaciones");
				form = $('#form-create-ubicaciones');   
				url = form.attr('action'); 
				$.ajax({
					url: url,
					type: 'GET',
					data: form.serialize(),
					success: function(response) {   

						$("#codigo_ubicacion").val(response.data);		
						$("#codigo_ubicacion").prop("readonly", true);
						$('#ubicacion-btn-buscar').attr('disabled','disabled');
						$("#nombre_ubicacion").focus(); 
					},
					error: function(xhr, status) {
						errors(xhr);
					},
				});	
				break;
				case "editar"://--------------------------------------------------------------------------
					table_ubicacion.fnFilter('');
					limpiar_campos_ubicaciones("ubicaciones");
					$("#codigo_ubicacion").focus(); 
					$("#codigo_ubicacion").prop("readonly", false);
					$('#ubicacion-btn-buscar').removeAttr('disabled');
					$("#ubicacion-btn-guardar").attr('disabled','disabled');
					$("#ubicacion-btn-eliminar").attr('disabled','disabled');
					$('#ubicacion-btn-anterior').removeAttr('disabled');
					$('#ubicacion-btn-siguiente').removeAttr('disabled');			
					$('#ubicacion-btn-primero').removeAttr('disabled');			
					$('#ubicacion-btn-ultimo').removeAttr('disabled');				
					nuevo_ubicacion = false;			
				break;
				case "buscar"://--------------------------------------------------------------------------
					if ($("#codigo_ubicacion").val().length == 0) {//busca a todos los registros
						$('#ubicacion-btn-buscar').attr('disabled','disabled');					
						$("#codigo_ubicacion").prop("readonly", false);	
						buscar_ubicaciones("ubicaciones");																	
					}else{//busqueda por codigo
						form = $('#form-edit-ubicaciones'); 
						url = form.attr('action').replace(':ID',$("#codigo_ubicacion").val()); 
						$.ajax({
							url: url,
							type: 'GET',
							data: form.serialize(),
							success: function(response) {
								if (response.data != null) {
									$("#codigo_ubicacion").val(response.data.id);
									$("#codigo_ubicacion").prop("readonly", true);
									$("#nombre_ubicacion").val(response.data.nombre);
									$("#descripcion_ubicacion").val(response.data.descripcion);								
									$('#ubicacion-btn-buscar').attr('disabled','disabled');
									$("#ubicacion-btn-eliminar").removeAttr('disabled');
									$("#ubicacion-btn-guardar").removeAttr('disabled');
								}else{					
									alert("Este codigo no existe en la base de datos");
									$("#codigo_ubicacion").focus(); 
								}				
							},
							error: function(xhr, status) {
								errors(xhr);
							},
						});
					}
					break;

				case "eliminar"://--------------------------------------------------------------------------
				if ($("#nombre_ubicacion").val().length == 0) {
					alert("Debe de editar un registro");
				}else  {
					
					if (confirm('Desea eliminar este registro')) {						
						form = $('#form-deletes-ubicaciones');   
						url = form.attr('action').replace(':ID',$("#codigo_ubicacion").val()); 
						$.ajax({
							url: url,
							type: 'DELETE',
							data: form.serialize(),
							success: function(response) {						
								if (response.status == "true") {								
									opciones_ubicacion("editar");
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
				$("#texto-modal-ayuda-ubicaciones").empty();
				$("#texto-modal-ayuda-ubicaciones").append(txt_ayuda("ubicaciones"));
				$("#modal_ayuda_ubicaciones").modal("show");	
				break; 

			}
		}

		

