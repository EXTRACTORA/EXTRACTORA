var nuevo_plantacion;

$(document).ready(function() {
	nuevo_plantacion = false;
	opciones_plantacion("inicializar");
});
function ir_plantacion(modulo,ir){

	$("#codigo_plantacion").prop("readonly", true);

	switch (ir) {
		case 'ir_siguiente':
		if ($("#codigo_plantacion").val().length == 0) {
			ir = "ir_primero";
		}	
		$("#plantacion-btn-anterior").removeAttr('disabled');
		$('#plantacion-btn-primero').removeAttr('disabled');	

		break;
		case 'ir_anterior':
		if ($("#codigo_plantacion").val().length == 0) {
			ir = 'ir_primero';
		}
		$("#plantacion-btn-siguiente").removeAttr('disabled');
		$('#plantacion-btn-ultimo').removeAttr('disabled');
		break;	
		case 'ir_ultimo':  	
		$("#plantacion-btn-anterior").removeAttr('disabled');
		$('#plantacion-btn-siguiente').attr('disabled','disabled');
		$('#plantacion-btn-ultimo').attr('disabled','disabled');
		break;
		case 'ir_primero':
		$('#plantacion-btn-anterior').attr('disabled','disabled');
		$("#plantacion-btn-siguiente").removeAttr('disabled');
		$('#plantacion-btn-primero').attr('disabled','disabled');
		break; 
	}

	$id = $("#codigo_plantacion").val();
	form = $('#form-store-prev_next');   
	url = form.attr('action');
	$.ajax({
		url: url,
		type: 'POST',
		data: { _token:CSRF_TOKEN, id: $id, modulo: modulo,prev_next:ir},
		success: function(response) { 						
			if (response.id == null) {
				if (ir == "ir_siguiente") {
					$('#plantacion-btn-siguiente').attr('disabled','disabled');
					$('#plantacion-btn-ultimo').attr('disabled','disabled');
				}else{
					$('#plantacion-btn-anterior').attr('disabled','disabled');
					$('#plantacion-btn-primero').attr('disabled','disabled');
				}
			}else{
				$("#codigo_plantacion").val(response.id);
				$("#nombre_plantacion").val(response.nombre);
				$("#descripcion_plantacion").val(response.descripcion);
				$("#plantacion-btn-guardar").removeAttr('disabled');
				$("#plantacion-btn-eliminar").removeAttr('disabled');
			}
		},
		error: function(xhr, status) {
			errors(xhr);          
		},
	});
}
function limpiar_campos_plantaciones(name){	
	$("#codigo_plantacion").val("");
	$("#nombre_plantacion").val("");
	$("#descripcion_plantacion").val("");
}
function opciones_plantacion(opcion){
	switch(opcion){
			case "inicializar"://--------------------------------------------------------------------------
			//keydown	  
		    $("#codigo_plantacion").keydown(function(event) {
		        
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
			$("#codigo_plantacion").keypress(function(event) {
				var keycode = (event.keyCode ? event.keyCode : event.which);
				table_plantacion.fnFilter('');
				if(keycode == '13'){//por si presionan ENTER					
					opciones_plantacion("buscar");
				}
			});
			$("#codigo_plantacion").focus(); 
			break;
			case "guardar":	//--------------------------------------------------------------------------
			if ($("#nombre_plantacion").val().length == 0) {
				alert("Campo nombre es obligatorio");
			}else  {
				//Es una edicion o nuevo registro?
					if (nuevo_plantacion) {//nuevo
						form = $('#form-store-plantaciones');   
						url = form.attr('action'); 
						$.ajax({
							url: url,
							type: 'POST',
							data: form.serialize(),
							success: function(response) {   
								alert(response.msg);
								opciones_plantacion("nuevo");
							},
							error: function(xhr, status) {
								errors(xhr);								
							},
						});
					}else{//editar
						form = $('#form-update-plantaciones');   
						url = form.attr('action').replace(':ID',$("#codigo_plantacion").val());						
						var data = { _token:CSRF_TOKEN, 
							nombre: $("#nombre_plantacion").val(), 
							descripcion:$("#descripcion_plantacion").val() 
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
			$("#plantacion-btn-guardar").removeAttr('disabled');
			$('#plantacion-btn-eliminar').attr('disabled','disabled');
			$('#plantacion-btn-anterior').attr('disabled','disabled');
			$('#plantacion-btn-siguiente').attr('disabled','disabled');			
			$('#plantacion-btn-primero').attr('disabled','disabled');			
			$('#plantacion-btn-ultimo').attr('disabled','disabled');

				//busca el ultimi id + 1
				nuevo_plantacion = true;	
				limpiar_campos_plantaciones("plantaciones");
				form = $('#form-create-plantaciones');   
				url = form.attr('action'); 
				$.ajax({
					url: url,
					type: 'GET',
					data: form.serialize(),
					success: function(response) {   

						$("#codigo_plantacion").val(response.data);		
						$("#codigo_plantacion").prop("readonly", true);
						$('#plantacion-btn-buscar').attr('disabled','disabled');
						$("#nombre_plantacion").focus(); 
					},
					error: function(xhr, status) {
						errors(xhr);
					},
				});	
				break;
				case "editar"://--------------------------------------------------------------------------
				table_plantacion.fnFilter('');
				limpiar_campos_plantaciones("plantaciones");
				$("#codigo_plantacion").focus(); 
				$("#codigo_plantacion").prop("readonly", false);
				$('#plantacion-btn-buscar').removeAttr('disabled');
				$("#plantacion-btn-guardar").attr('disabled','disabled');
				$("#plantacion-btn-eliminar").attr('disabled','disabled');
				$('#plantacion-btn-anterior').removeAttr('disabled');
				$('#plantacion-btn-siguiente').removeAttr('disabled');			
				$('#plantacion-btn-primero').removeAttr('disabled');			
				$('#plantacion-btn-ultimo').removeAttr('disabled');				
				nuevo_plantacion = false;			
				break;
				case "buscar"://--------------------------------------------------------------------------
				modulo = "plantaciones";
					if ($("#codigo_plantacion").val().length == 0) {//busca a todos los registros
						$('#plantacion-btn-buscar').attr('disabled','disabled');				
						$("#codigo_plantacion").prop("readonly", false); 
						buscar_plantaciones("plantaciones");					
					}else{//busqueda por codigo
						form = $('#form-edit-plantaciones'); 
						url = form.attr('action').replace(':ID',$("#codigo_plantacion").val()); 
						$.ajax({
							url: url,
							type: 'GET',
							data: form.serialize(),
							success: function(response) {
								if (response.data != null) {
									$("#codigo_plantacion").val(response.data.id);
									$("#codigo_plantacion").prop("readonly", true);
									$("#nombre_plantacion").val(response.data.nombre);
									$("#descripcion_plantacion").val(response.data.descripcion);								
									$('#plantacion-btn-buscar').attr('disabled','disabled');
									$("#plantacion-btn-eliminar").removeAttr('disabled');
									$("#plantacion-btn-guardar").removeAttr('disabled');
								}else{					
									alert("Este codigo no existe en la base de datos");
									$("#codigo_plantacion").focus(); 
								}				
							},
							error: function(xhr, status) {
								errors(xhr);
							},
						});
					}
					break;
					
				case "eliminar"://--------------------------------------------------------------------------
				if ($("#nombre_plantacion").val().length == 0) {
					alert("Debe de editar un registro");
				}else  {
					
					if (confirm('Desea eliminar este registro')) {						
						form = $('#form-deletes-plantaciones');   
						url = form.attr('action').replace(':ID',$("#codigo_plantacion").val()); 
						$.ajax({
							url: url,
							type: 'DELETE',
							data: form.serialize(),
							success: function(response) {						
								if (response.status == "true") {								
									opciones_plantacion("editar");
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
				$("#texto-modal-ayuda-plantaciones").empty();
				$("#texto-modal-ayuda-plantaciones").append(txt_ayuda("plantaciones"));
				$("#modal_ayuda_plantaciones").modal("show");	
				break; 

			}
		}

		

