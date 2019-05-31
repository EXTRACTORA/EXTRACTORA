var nuevo_unidades_medida;
var table_unidades_medida;
$(document).ready(function() {
	nuevo_unidades_medida = false;
	opciones_unidades_medida("inicializar");
});
function ir_unidades_medida(modulo,ir){

	$("#codigo_unidades_medida").prop("readonly", true);

	switch (ir) {
		case 'ir_siguiente':
		if ($("#codigo_unidades_medida").val().length == 0) {
			ir = "ir_primero";
		}	
		$("#unidades_medida-btn-anterior").removeAttr('disabled');
		$('#unidades_medida-btn-primero').removeAttr('disabled');	

		break;
		case 'ir_anterior':
		if ($("#codigo_unidades_medida").val().length == 0) {
			ir = 'ir_primero';
		}
		$("#unidades_medida-btn-siguiente").removeAttr('disabled');
		$('#unidades_medida-btn-ultimo').removeAttr('disabled');
		break;	
		case 'ir_ultimo':  	
		$("#unidades_medida-btn-anterior").removeAttr('disabled');
		$('#unidades_medida-btn-siguiente').attr('disabled','disabled');
		$('#unidades_medida-btn-ultimo').attr('disabled','disabled');
		break;
		case 'ir_primero':
		$('#unidades_medida-btn-anterior').attr('disabled','disabled');
		$("#unidades_medida-btn-siguiente").removeAttr('disabled');
		$('#unidades_medida-btn-primero').attr('disabled','disabled');
		break; 
	}

	$id = $("#codigo_unidades_medida").val();
	form = $('#form-store-prev_next');   
	url = form.attr('action');
	$.ajax({
		url: url,
		type: 'POST',
		data: { _token:CSRF_TOKEN, id: $id, modulo: modulo,prev_next:ir},
		success: function(response) { 						
			if (response.id == null) {
				if (ir == "ir_siguiente") {
					$('#unidades_medida-btn-siguiente').attr('disabled','disabled');
					$('#unidades_medida-btn-ultimo').attr('disabled','disabled');
				}else{
					$('#unidades_medida-btn-anterior').attr('disabled','disabled');
					$('#unidades_medida-btn-primero').attr('disabled','disabled');
				}
			}else{
				$("#codigo_unidades_medida").val(response.id);
				$("#nombre_unidades_medida").val(response.nombre);
				$("#abreviatura_unidades_medida").val(response.abreviatura);
				$("#descripcion_unidades_medida").val(response.descripcion);
				$("#unidades_medida-btn-guardar").removeAttr('disabled');
				$("#unidades_medida-btn-eliminar").removeAttr('disabled');
			}
		},
		error: function(xhr, status) {
			errors(xhr);          
		},
	});
}
function limpiar_campos_unidades_medidas(name){	
	$("#codigo_unidades_medida").val("");
	$("#nombre_unidades_medida").val("");
	$("#abreviatura_unidades_medida").val("");
	$("#descripcion_unidades_medida").val("");
}
function opciones_unidades_medida(opcion){
	switch(opcion){
		case "inicializar"://--------------------------------------------------------------------------
		table_unidades_medida = $('#table-unidades_medidas').dataTable({"oLanguage": txt_ayuda("lenguaje")});

				//click 
				table_unidades_medida.on("click","tr", function () {				
					form = $('#form-edit-unidades_medidas');  
					url = form.attr('action').replace(':ID',table_unidades_medida.fnGetData(this)[0]);
					$.get(url, function(response) {	
						$("#codigo_unidades_medida").prop("readonly", true);					
						$("#codigo_unidades_medida").val(response.data.id);						
						$("#nombre_unidades_medida").val(response.data.nombre);
						$("#abreviatura_unidades_medida").val(response.data.abreviatura);
						$("#descripcion_unidades_medida").val(response.data.descripcion);						
						$('#unidades_medida-btn-buscar').attr('disabled','disabled');
						$("#unidades_medida-btn-guardar").removeAttr('disabled');
						$("#unidades_medida-btn-eliminar").removeAttr('disabled');							
					}).fail(function(xhr, status) {				
						errors(xhr); 				
					});	
					$("#modal_unidades_medidas").modal("hide");
				});	

				//keypress
				$("#codigo_unidades_medida").keypress(function(event) {
					var keycode = (event.keyCode ? event.keyCode : event.which);
					table_unidades_medida.fnFilter('');
							if(keycode == '13'){//por si presionan ENTER					
								opciones_unidades_medida("buscar");
							}
						});
				$("#codigo_unidades_medida").focus(); 
				break;
			case "guardar":	//--------------------------------------------------------------------------
			if ($("#nombre_unidades_medida").val().length == 0) {
				alert("Campo nombre es obligatorio");
			}else  {
				//Es una edicion o nuevo registro?
					if (nuevo_unidades_medida) {//nuevo
						form = $('#form-store-unidades_medidas');   
						url = form.attr('action'); 
						$.ajax({
							url: url,
							type: 'POST',
							data: form.serialize(),
							success: function(response) {   
								alert(response.msg);
								opciones_unidades_medida("nuevo");
							},
							error: function(xhr, status) {
								errors(xhr);								
							},
						});
					}else{//editar
						form = $('#form-update-unidades_medidas');   
						url = form.attr('action').replace(':ID',$("#codigo_unidades_medida").val());						
						var data = { _token:CSRF_TOKEN, 
							nombre: $("#nombre_unidades_medida").val(), 
							abreviatura: $("#abreviatura_unidades_medida").val(),
							descripcion:$("#descripcion_unidades_medida").val() 
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
			$("#unidades_medida-btn-guardar").removeAttr('disabled');
			$('#unidades_medida-btn-eliminar').attr('disabled','disabled');
			$('#unidades_medida-btn-anterior').attr('disabled','disabled');
			$('#unidades_medida-btn-siguiente').attr('disabled','disabled');			
			$('#unidades_medida-btn-primero').attr('disabled','disabled');			
			$('#unidades_medida-btn-ultimo').attr('disabled','disabled');

				//busca el ultimi id + 1
				nuevo_unidades_medida = true;	
				limpiar_campos_unidades_medidas("unidades_medidas");
				form = $('#form-create-unidades_medidas');   
				url = form.attr('action'); 
				$.ajax({
					url: url,
					type: 'GET',
					data: form.serialize(),
					success: function(response) {   

						$("#codigo_unidades_medida").val(response.data);		
						$("#codigo_unidades_medida").prop("readonly", true);
						$('#unidades_medida-btn-buscar').attr('disabled','disabled');
						$("#nombre_unidades_medida").focus(); 
					
					},
					error: function(xhr, status) {
						errors(xhr);
					},
				});	
				break;
				case "editar"://--------------------------------------------------------------------------
				table_unidades_medida.fnFilter('');
				limpiar_campos_unidades_medidas("unidades_medidas");
				$("#codigo_unidades_medida").focus(); 
				$("#codigo_unidades_medida").prop("readonly", false);
				$('#unidades_medida-btn-buscar').removeAttr('disabled');
				$("#unidades_medida-btn-guardar").attr('disabled','disabled');
				$("#unidades_medida-btn-eliminar").attr('disabled','disabled');
				$('#unidades_medida-btn-anterior').removeAttr('disabled');
				$('#unidades_medida-btn-siguiente').removeAttr('disabled');			
				$('#unidades_medida-btn-primero').removeAttr('disabled');			
				$('#unidades_medida-btn-ultimo').removeAttr('disabled');				
				nuevo_unidades_medida = false;			
				break;
				case "buscar"://--------------------------------------------------------------------------
				
					if ($("#codigo_unidades_medida").val().length == 0) {//busca a todos los registros
						form = $('#form-show-unidades_medidas');   
						url = form.attr('action').replace(':ID',0); 
						table_unidades_medida.fnClearTable();
						$.get(url, function(response) {						
							$.each( response.data, function( key, value ) {
								table_unidades_medida.fnAddData([value.id,value.nombre]);	
							});
							$('#unidades_medida-btn-buscar').attr('disabled','disabled');
							$('#unidades_medida-btn-buscar').removeAttr('disabled');
							$("#codigo_unidades_medida").prop("readonly", false);						
							$("#modal_unidades_medidas").modal("show");
						}).fail(function(xhr, status) {				
							errors(xhr);
						});
					}else{//busqueda por codigo
						form = $('#form-edit-unidades_medidas'); 
						url = form.attr('action').replace(':ID',$("#codigo_unidades_medida").val()); 
						$.ajax({
							url: url,
							type: 'GET',
							data: form.serialize(),
							success: function(response) {
								if (response.data != null) {
									$("#codigo_unidades_medida").val(response.data.id);
									$("#codigo_unidades_medida").prop("readonly", true);
									$("#nombre_unidades_medida").val(response.data.nombre);
									$("#abreviatura_unidades_medida").val(response.data.abreviatura);
									$("#descripcion_unidades_medida").val(response.data.descripcion);								
									$('#unidades_medida-btn-buscar').attr('disabled','disabled');
									$("#unidades_medida-btn-eliminar").removeAttr('disabled');
									$("#unidades_medida-btn-guardar").removeAttr('disabled');
								}else{					
									alert("Este codigo no existe en la base de datos");
									$("#codigo_unidades_medida").focus(); 
								}				
							},
							error: function(xhr, status) {
								errors(xhr);
							},
						});
					}
					break;
					
				case "eliminar"://--------------------------------------------------------------------------
				if ($("#nombre_unidades_medida").val().length == 0) {
					alert("Debe de editar un registro");
				}else  {
					
					if (confirm('Desea eliminar este registro')) {						
						form = $('#form-deletes-unidades_medidas');   
						url = form.attr('action').replace(':ID',$("#codigo_unidades_medida").val()); 
						$.ajax({
							url: url,
							type: 'DELETE',
							data: form.serialize(),
							success: function(response) {						
								if (response.status == "true") {								
									opciones_unidades_medida("editar");
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
				$("#texto-modal-ayuda-unidades_medidas").empty();
				$("#texto-modal-ayuda-unidades_medidas").append(txt_ayuda("unidades_medidas"));
				$("#modal_ayuda_unidades_medidas").modal("show");	
				break; 

			}
		}

		

