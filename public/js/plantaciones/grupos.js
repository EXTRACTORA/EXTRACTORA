var nuevo_grupo;
var table_grupo;
$(document).ready(function() {
	nuevo_grupo = false;
	opciones_grupo("inicializar");
});
function ir_grupo(modulo,ir){

	$("#codigo_grupo").prop("readonly", true);

	switch (ir) {
		case 'ir_siguiente':
		if ($("#codigo_grupo").val().length == 0) {
			ir = "ir_primero";
		}	
		$("#grupo-btn-anterior").removeAttr('disabled');
		$('#grupo-btn-primero').removeAttr('disabled');	

		break;
		case 'ir_anterior':
		if ($("#codigo_grupo").val().length == 0) {
			ir = 'ir_primero';
		}
		$("#grupo-btn-siguiente").removeAttr('disabled');
		$('#grupo-btn-ultimo').removeAttr('disabled');
		break;	
		case 'ir_ultimo':  	
		$("#grupo-btn-anterior").removeAttr('disabled');
		$('#grupo-btn-siguiente').attr('disabled','disabled');
		$('#grupo-btn-ultimo').attr('disabled','disabled');
		break;
		case 'ir_primero':
		$('#grupo-btn-anterior').attr('disabled','disabled');
		$("#grupo-btn-siguiente").removeAttr('disabled');
		$('#grupo-btn-primero').attr('disabled','disabled');
		break; 
	}

	$id = $("#codigo_grupo").val();
	form = $('#form-store-prev_next');   
	url = form.attr('action');
	$.ajax({
		url: url,
		type: 'POST',
		data: { _token:CSRF_TOKEN, id: $id, modulo: modulo,prev_next:ir},
		success: function(response) { 						
			if (response.id == null) {
				if (ir == "ir_siguiente") {
					$('#grupo-btn-siguiente').attr('disabled','disabled');
					$('#grupo-btn-ultimo').attr('disabled','disabled');
				}else{
					$('#grupo-btn-anterior').attr('disabled','disabled');
					$('#grupo-btn-primero').attr('disabled','disabled');
				}
			}else{
				$("#codigo_grupo").val(response.id);
				$("#nombre_grupo").val(response.nombre);
				$("#descripcion_grupo").val(response.descripcion);
				$("#grupo-btn-guardar").removeAttr('disabled');
				$("#grupo-btn-eliminar").removeAttr('disabled');
			}
		},
		error: function(xhr, status) {
			errors(xhr);          
		},
	});
}
function limpiar_campos_grupos(name){	
	$("#codigo_grupo").val("");
	$("#nombre_grupo").val("");
	$("#descripcion_grupo").val("");
}
function opciones_grupo(opcion){
	switch(opcion){
		case "inicializar"://--------------------------------------------------------------------------
					//keypress
					$("#codigo_grupo").keypress(function(event) {
						var keycode = (event.keyCode ? event.keyCode : event.which);
						table_grupo.fnFilter('');
							if(keycode == '13'){//por si presionan ENTER					
								opciones_grupo("buscar");
							}
						});
					$("#codigo_grupo").focus(); 
					break;
			case "guardar":	//--------------------------------------------------------------------------
			if ($("#nombre_grupo").val().length == 0) {
				alert("Campo nombre es obligatorio");
			}else  {
				//Es una edicion o nuevo registro?
					if (nuevo_grupo) {//nuevo
						form = $('#form-store-grupos');   
						url = form.attr('action'); 
						$.ajax({
							url: url,
							type: 'POST',
							data: form.serialize(),
							success: function(response) {   
								alert(response.msg);
								opciones_grupo("nuevo");
							},
							error: function(xhr, status) {
								errors(xhr);								
							},
						});
					}else{//editar
						form = $('#form-update-grupos');   
						url = form.attr('action').replace(':ID',$("#codigo_grupo").val());						
						var data = { _token:CSRF_TOKEN, 
							nombre: $("#nombre_grupo").val(), 
							descripcion:$("#descripcion_grupo").val() 
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
			$("#grupo-btn-guardar").removeAttr('disabled');
			$('#grupo-btn-eliminar').attr('disabled','disabled');
			$('#grupo-btn-anterior').attr('disabled','disabled');
			$('#grupo-btn-siguiente').attr('disabled','disabled');			
			$('#grupo-btn-primero').attr('disabled','disabled');			
			$('#grupo-btn-ultimo').attr('disabled','disabled');

				//busca el ultimi id + 1
				nuevo_grupo = true;	
				limpiar_campos_grupos("grupos");
				form = $('#form-create-grupos');   
				url = form.attr('action'); 
				$.ajax({
					url: url,
					type: 'GET',
					data: form.serialize(),
					success: function(response) {   

						$("#codigo_grupo").val(response.data);		
						$("#codigo_grupo").prop("readonly", true);
						$('#grupo-btn-buscar').attr('disabled','disabled');
						$("#nombre_grupo").focus(); 
					},
					error: function(xhr, status) {
						errors(xhr);
					},
				});	
				break;
				case "editar"://--------------------------------------------------------------------------
				table_grupo.fnFilter('');
				limpiar_campos_grupos("grupos");
				$("#codigo_grupo").focus(); 
				$("#codigo_grupo").prop("readonly", false);
				$('#grupo-btn-buscar').removeAttr('disabled');
				$("#grupo-btn-guardar").attr('disabled','disabled');
				$("#grupo-btn-eliminar").attr('disabled','disabled');
				$('#grupo-btn-anterior').removeAttr('disabled');
				$('#grupo-btn-siguiente').removeAttr('disabled');			
				$('#grupo-btn-primero').removeAttr('disabled');			
				$('#grupo-btn-ultimo').removeAttr('disabled');				
				nuevo_grupo = false;			
				break;
				case "buscar"://--------------------------------------------------------------------------
					if ($("#codigo_grupo").val().length == 0) {//busca a todos los registros
						$('#grupo-btn-buscar').attr('disabled','disabled');
						$("#codigo_grupo").prop("readonly", false);	
						buscar_grupos("grupos");		
					}else{//busqueda por codigo
						form = $('#form-edit-grupos'); 
						url = form.attr('action').replace(':ID',$("#codigo_grupo").val()); 
						$.ajax({
							url: url,
							type: 'GET',
							data: form.serialize(),
							success: function(response) {
								if (response.data != null) {
									$("#codigo_grupo").val(response.data.id);
									$("#codigo_grupo").prop("readonly", true);
									$("#nombre_grupo").val(response.data.nombre);
									$("#descripcion_grupo").val(response.data.descripcion);								
									$('#grupo-btn-buscar').attr('disabled','disabled');
									$("#grupo-btn-eliminar").removeAttr('disabled');
									$("#grupo-btn-guardar").removeAttr('disabled');
								}else{					
									alert("Este codigo no existe en la base de datos");
									$("#codigo_grupo").focus(); 
								}				
							},
							error: function(xhr, status) {
								errors(xhr);
							},
						});
					}
					break;					
				case "eliminar"://--------------------------------------------------------------------------
				if ($("#nombre_grupo").val().length == 0) {
					alert("Debe de editar un registro");
				}else  {
					
					if (confirm('Desea eliminar este registro')) {						
						form = $('#form-deletes-grupos');   
						url = form.attr('action').replace(':ID',$("#codigo_grupo").val()); 
						$.ajax({
							url: url,
							type: 'DELETE',
							data: form.serialize(),
							success: function(response) {						
								if (response.status == "true") {								
									opciones_grupo("editar");
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
				$("#texto-modal-ayuda-grupos").empty();
				$("#texto-modal-ayuda-grupos").append(txt_ayuda("grupos"));
				$("#modal_ayuda_grupos").modal("show");	
				break; 

			}
		}

		

