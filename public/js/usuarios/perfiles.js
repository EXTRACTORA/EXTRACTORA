var nuevo_perfil;
$(document).ready(function() {
	nuevo_perfil = false;
	opciones_perfil("inicializar");
});
function ir_perfil(modulo,ir){

	$("#codigo_perfil").prop("readonly", true);

	switch (ir) {
		case 'ir_siguiente':
		if ($("#codigo_perfil").val().length == 0) {
			ir = "ir_primero";
		}	
		$("#perfil-btn-anterior").removeAttr('disabled');
		$('#perfil-btn-primero').removeAttr('disabled');	

		break;
		case 'ir_anterior':
		if ($("#codigo_perfil").val().length == 0) {
			ir = 'ir_primero';
		}
		$("#perfil-btn-siguiente").removeAttr('disabled');
		$('#perfil-btn-ultimo').removeAttr('disabled');
		break;	
		case 'ir_ultimo':  	
		$("#perfil-btn-anterior").removeAttr('disabled');
		$('#perfil-btn-siguiente').attr('disabled','disabled');
		$('#perfil-btn-ultimo').attr('disabled','disabled');
		break;
		case 'ir_primero':
		$('#perfil-btn-anterior').attr('disabled','disabled');
		$("#perfil-btn-siguiente").removeAttr('disabled');
		$('#perfil-btn-primero').attr('disabled','disabled');
		break; 
	}

	$id = $("#codigo_perfil").val();
	form = $('#form-store-prev_next');   
	url = form.attr('action');
	$.ajax({
		url: url,
		type: 'POST',
		data: { _token:CSRF_TOKEN, id: $id, modulo: modulo,prev_next:ir},
		success: function(response) { 						
			if (response.id == null) {
				if (ir == "ir_siguiente") {
					$('#perfil-btn-siguiente').attr('disabled','disabled');
					$('#perfil-btn-ultimo').attr('disabled','disabled');
				}else{
					$('#perfil-btn-anterior').attr('disabled','disabled');
					$('#perfil-btn-primero').attr('disabled','disabled');
				}
			}else{
				$("#codigo_perfil").val(response.id);
				$("#nombre_perfil").val(response.nombre);
				$("#descripcion_perfil").val(response.descripcion);
				$("#perfil-btn-guardar").removeAttr('disabled');
				$("#perfil-btn-eliminar").removeAttr('disabled');
			}
		},
		error: function(xhr, status) {
			errors(xhr);          
		},
	});
}
function limpiar_campos_perfiles(name){	
	$("#codigo_perfil").val("");
	$("#nombre_perfil").val("");
	$("#descripcion_perfil").val("");
}
function opciones_perfil(opcion){
	switch(opcion){
			case "inicializar"://--------------------------------------------------------------------------
				//keydown	  
			    $("#codigo_perfil").keydown(function(event) {			        
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
				$("#codigo_perfil").keypress(function(event) {
					var keycode = (event.keyCode ? event.keyCode : event.which);
					table_perfil.fnFilter('');
					if(keycode == '13'){//por si presionan ENTER					
						opciones_perfil("buscar");
					}
				});
			break;
			case "guardar":	//--------------------------------------------------------------------------
			if ($("#nombre_perfil").val().length == 0) {
				alert("Campo nombre es obligatorio");
			}else  {
				//Es una edicion o nuevo registro?
					if (nuevo_perfil) {//nuevo
						form = $('#form-store-perfiles');   
						url = form.attr('action'); 
						$.ajax({
							url: url,
							type: 'POST',
							data: form.serialize(),
							success: function(response) {   
								alert(response.msg);
								opciones_perfil("nuevo");
							},
							error: function(xhr, status) {
								errors(xhr);								
							},
						});
					}else{//editar
						form = $('#form-update-perfiles');   
						url = form.attr('action').replace(':ID',$("#codigo_perfil").val());						
						var data = { _token:CSRF_TOKEN, 
							nombre: $("#nombre_perfil").val(), 
							descripcion:$("#descripcion_perfil").val() 
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
			$("#perfil-btn-guardar").removeAttr('disabled');
			$('#perfil-btn-eliminar').attr('disabled','disabled');
			$('#perfil-btn-anterior').attr('disabled','disabled');
			$('#perfil-btn-siguiente').attr('disabled','disabled');			
			$('#perfil-btn-primero').attr('disabled','disabled');			
			$('#perfil-btn-ultimo').attr('disabled','disabled');

				//busca el ultimi id + 1
				nuevo_perfil = true;	
				limpiar_campos_perfiles("perfiles");
				form = $('#form-create-perfiles');   
				url = form.attr('action'); 
				$.ajax({
					url: url,
					type: 'GET',
					data: form.serialize(),
					success: function(response) {   

						$("#codigo_perfil").val(response.data);		
						$("#codigo_perfil").prop("readonly", true);
						$('#perfil-btn-buscar').attr('disabled','disabled');
						$("#nombre_perfil").focus(); 
					},
					error: function(xhr, status) {
						errors(xhr);
					},
				});	
				break;
				case "editar"://--------------------------------------------------------------------------
				table_perfil.fnFilter('');
				limpiar_campos_perfiles("perfiles");
				$("#codigo_perfil").focus(); 
				$("#codigo_perfil").prop("readonly", false);
				$('#perfil-btn-buscar').removeAttr('disabled');
				$("#perfil-btn-guardar").attr('disabled','disabled');
				$("#perfil-btn-eliminar").attr('disabled','disabled');
				$('#perfil-btn-anterior').removeAttr('disabled');
				$('#perfil-btn-siguiente').removeAttr('disabled');			
				$('#perfil-btn-primero').removeAttr('disabled');			
				$('#perfil-btn-ultimo').removeAttr('disabled');				
				nuevo_perfil = false;			
				break;
				case "buscar"://--------------------------------------------------------------------------
					if ($("#codigo_perfil").val().length == 0) {//busca a todos los registros
						buscar_perfiles("perfiles");
						$('#perfil-btn-buscar').attr('disabled','disabled');
						$("#codigo_perfil").prop("readonly", false);
					}else{//busqueda por codigo
						form = $('#form-edit-perfiles'); 
						url = form.attr('action').replace(':ID',$("#codigo_perfil").val()); 
						$.ajax({
							url: url,
							type: 'GET',
							data: form.serialize(),
							success: function(response) {
								if (response.data != null) {
									$("#codigo_perfil").val(response.data.id);
									$("#codigo_perfil").prop("readonly", true);
									$("#nombre_perfil").val(response.data.nombre);
									$("#descripcion_perfil").val(response.data.descripcion);								
									$('#perfil-btn-buscar').attr('disabled','disabled');
									$("#perfil-btn-eliminar").removeAttr('disabled');
									$("#perfil-btn-guardar").removeAttr('disabled');
								}else{					
									alert("Este codigo no existe en la base de datos");
									$("#codigo_perfil").focus(); 
								}				
							},
							error: function(xhr, status) {
								errors(xhr);
							},
						});
					}
					break;

				case "eliminar"://--------------------------------------------------------------------------
				if ($("#nombre_perfil").val().length == 0) {
					alert("Debe de editar un registro");
				}else  {
					
					if (confirm('Desea eliminar este registro')) {						
						form = $('#form-deletes-perfiles');   
						url = form.attr('action').replace(':ID',$("#codigo_perfil").val()); 
						$.ajax({
							url: url,
							type: 'DELETE',
							data: form.serialize(),
							success: function(response) {						
								if (response.status == "true") {								
									opciones_perfil("editar");
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
				$("#texto-modal-ayuda-perfiles").empty();
				$("#texto-modal-ayuda-perfiles").append(txt_ayuda("perfil"));
				$("#modal_ayuda_perfiles").modal("show");	
				break; 

			}
		}

		

