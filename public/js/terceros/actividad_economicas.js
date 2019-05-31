var nuevo_actividad_economica;
// var table_actividad_economica;
$(document).ready(function() {
	nuevo_actividad_economica = false;
	opciones_actividad_economica("inicializar");
});
function ir_actividad_economica(modulo,ir){
	$("#codigo_actividad_economica").prop("readonly", true);

	switch (ir) {
		case 'ir_siguiente':
		if ($("#codigo_actividad_economica").val().length == 0) {
			ir = "ir_primero";
		}	
		$("#actividad_economica-btn-anterior").removeAttr('disabled');
		$('#actividad_economica-btn-primero').removeAttr('disabled');	

		break;
		case 'ir_anterior':
		if ($("#codigo_actividad_economica").val().length == 0) {
			ir = 'ir_primero';
		}
		$("#actividad_economica-btn-siguiente").removeAttr('disabled');
		$('#actividad_economica-btn-ultimo').removeAttr('disabled');
		break;	
		case 'ir_ultimo':  	
		$("#actividad_economica-btn-anterior").removeAttr('disabled');
		$('#actividad_economica-btn-siguiente').attr('disabled','disabled');
		$('#actividad_economica-btn-ultimo').attr('disabled','disabled');
		break;
		case 'ir_primero':
		$('#actividad_economica-btn-anterior').attr('disabled','disabled');
		$("#actividad_economica-btn-siguiente").removeAttr('disabled');
		$('#actividad_economica-btn-primero').attr('disabled','disabled');
		break; 
	}

	$id = $("#codigo_actividad_economica").val();
	form = $('#form-store-prev_next');   
	url = form.attr('action');
	$.ajax({
		url: url,
		type: 'POST',
		data: { _token:CSRF_TOKEN, id: $id, modulo: modulo,prev_next:ir},
		success: function(response) { 						
			if (response.id == null) {
				if (ir == "ir_siguiente") {
					$('#actividad_economica-btn-siguiente').attr('disabled','disabled');
					$('#actividad_economica-btn-ultimo').attr('disabled','disabled');
				}else{
					$('#actividad_economica-btn-anterior').attr('disabled','disabled');
					$('#actividad_economica-btn-primero').attr('disabled','disabled');
				}
			}else{
				$("#codigo_actividad_economica").val(response.id);
				$("#nombre_actividad_economica").val(response.nombre);
				$("#descripcion_actividad_economica").val(response.descripcion);
				$("#actividad_economica-btn-guardar").removeAttr('disabled');
				$("#actividad_economica-btn-eliminar").removeAttr('disabled');
			}
		},
		error: function(xhr, status) {
			errors(xhr);          
		},
	});
}
function limpiar_campos_actividad_economicas(name){	
	$("#codigo_actividad_economica").val("");
	$("#nombre_actividad_economica").val("");
	$("#descripcion_actividad_economica").val("");
}
function opciones_actividad_economica(opcion){
	switch(opcion){
		case "inicializar"://--------------------------------------------------------------------------	
					//keydown	  
				    $("#codigo_actividad_economica").keydown(function(event) {
				        
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
					$("#codigo_actividad_economica").keypress(function(event) {
						var keycode = (event.keyCode ? event.keyCode : event.which);
						table_actividad_economica.fnFilter('');
							if(keycode == '13'){//por si presionan ENTER					
								opciones_actividad_economica("buscar");
							}
						});		
				

					break;
			case "guardar":	//--------------------------------------------------------------------------
			if ($("#nombre_actividad_economica").val().length == 0) {
				alert("Campo nombre es obligatorio");
			}else  {
				//Es una edicion o nuevo registro?
					if (nuevo_actividad_economica) {//nuevo
						form = $('#form-store-actividad_economicas');   
						url = form.attr('action'); 
						$.ajax({
							url: url,
							type: 'POST',
							data: form.serialize(),
							success: function(response) {   
								alert(response.msg);
								opciones_actividad_economica("nuevo");
							},
							error: function(xhr, status) {
								errors(xhr);								
							},
						});
					}else{//editar
						form = $('#form-update-actividad_economicas');   
						url = form.attr('action').replace(':ID',$("#codigo_actividad_economica").val());						
						var data = { _token:CSRF_TOKEN, 
							nombre: $("#nombre_actividad_economica").val(), 
							descripcion:$("#descripcion_actividad_economica").val() 
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
			$("#actividad_economica-btn-guardar").removeAttr('disabled');
			$('#actividad_economica-btn-eliminar').attr('disabled','disabled');
			$('#actividad_economica-btn-anterior').attr('disabled','disabled');
			$('#actividad_economica-btn-siguiente').attr('disabled','disabled');			
			$('#actividad_economica-btn-primero').attr('disabled','disabled');			
			$('#actividad_economica-btn-ultimo').attr('disabled','disabled');

				//busca el ultimi id + 1
				nuevo_actividad_economica = true;	
				limpiar_campos_actividad_economicas("actividad_economicas");
				form = $('#form-create-actividad_economicas');   
				url = form.attr('action'); 
				$.ajax({
					url: url,
					type: 'GET',
					data: form.serialize(),
					success: function(response) {   

						$("#codigo_actividad_economica").val(response.data);		
						$("#codigo_actividad_economica").prop("readonly", true);
						$('#actividad_economica-btn-buscar').attr('disabled','disabled');
						$("#nombre_actividad_economica").focus(); 
					},
					error: function(xhr, status) {
						errors(xhr);
					},
				});	
				break;
				case "editar"://--------------------------------------------------------------------------
				table_actividad_economica.fnFilter('');
				limpiar_campos_actividad_economicas("actividad_economicas");
				$("#codigo_actividad_economica").focus(); 
				$("#codigo_actividad_economica").prop("readonly", false);
				$('#actividad_economica-btn-buscar').removeAttr('disabled');
				$("#actividad_economica-btn-guardar").attr('disabled','disabled');
				$("#actividad_economica-btn-eliminar").attr('disabled','disabled');
				$('#actividad_economica-btn-anterior').removeAttr('disabled');
				$('#actividad_economica-btn-siguiente').removeAttr('disabled');			
				$('#actividad_economica-btn-primero').removeAttr('disabled');			
				$('#actividad_economica-btn-ultimo').removeAttr('disabled');				
				nuevo_actividad_economica = false;			
				break;
				case "buscar"://--------------------------------------------------------------------------
						if ($("#codigo_actividad_economica").val().length == 0) {//busca a todos los registros
							$('#actividad_economica-btn-buscar').attr('disabled','disabled');					
							$("#codigo_actividad_economica").prop("readonly", false);
							buscar_actividad_economica("actividad_economicas");									
					}else{//busqueda por codigo


						form = $('#form-edit-actividad_economicas'); 
						url = form.attr('action').replace(':ID',$("#codigo_actividad_economica").val()); 
						$.ajax({
							url: url,
							type: 'GET',
							data: form.serialize(),
							success: function(response) {

								if (response.data != null) {
									$("#codigo_actividad_economica").val(response.data.id);
									$("#codigo_actividad_economica").prop("readonly", true);
									$("#nombre_actividad_economica").val(response.data.nombre);
									$("#descripcion_actividad_economica").val(response.data.descripcion);								
									$('#actividad_economica-btn-buscar').attr('disabled','disabled');
									$("#actividad_economica-btn-eliminar").removeAttr('disabled');
									$("#actividad_economica-btn-guardar").removeAttr('disabled');

								}else{					
									alert("Este codigo no existe en la base de datos");
									$("#codigo_actividad_economica").focus(); 

								}				
							},
							error: function(xhr, status) {
								errors(xhr);
							},
						});
					}
					break;

				case "eliminar"://--------------------------------------------------------------------------
				if ($("#nombre_actividad_economica").val().length == 0) {
					alert("Debe de editar un registro");
				}else  {
					
					if (confirm('Desea eliminar este registro')) {						
						form = $('#form-deletes-actividad_economicas');   
						url = form.attr('action').replace(':ID',$("#codigo_actividad_economica").val()); 
						$.ajax({
							url: url,
							type: 'DELETE',
							data: form.serialize(),
							success: function(response) {						
								if (response.status == "true") {								
									opciones_actividad_economica("editar");
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
				$("#texto-modal-ayuda-actividad_economicas").empty();
				$("#texto-modal-ayuda-actividad_economicas").append(txt_ayuda("actividad_economicas"));
				$("#modal_ayuda_actividad_economicas").modal("show");
				break; 

			}
		}

		

