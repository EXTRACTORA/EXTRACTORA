var nuevo_zona;
// var table_zona;
$(document).ready(function() {
	nuevo_zona = false;
	opciones_zona("inicializar");
});
function ir_zona(modulo,ir){

	$("#codigo_zona").prop("readonly", true);

	switch (ir) {
		case 'ir_siguiente':
		if ($("#codigo_zona").val().length == 0) {
			ir = "ir_primero";
		}	
		$("#zona-btn-anterior").removeAttr('disabled');
		$('#zona-btn-primero').removeAttr('disabled');	

		break;
		case 'ir_anterior':
		if ($("#codigo_zona").val().length == 0) {
			ir = 'ir_primero';
		}
		$("#zona-btn-siguiente").removeAttr('disabled');
		$('#zona-btn-ultimo').removeAttr('disabled');
		break;	
		case 'ir_ultimo':  	
		$("#zona-btn-anterior").removeAttr('disabled');
		$('#zona-btn-siguiente').attr('disabled','disabled');
		$('#zona-btn-ultimo').attr('disabled','disabled');
		break;
		case 'ir_primero':
		$('#zona-btn-anterior').attr('disabled','disabled');
		$("#zona-btn-siguiente").removeAttr('disabled');
		$('#zona-btn-primero').attr('disabled','disabled');
		break; 
	}

	$id = $("#codigo_zona").val();
	form = $('#form-store-prev_next');   
	url = form.attr('action');
	$.ajax({
		url: url,
		type: 'POST',
		data: { _token:CSRF_TOKEN, id: $id, modulo: modulo,prev_next:ir},
		success: function(response) { 						
			if (response.id == null) {
				if (ir == "ir_siguiente") {
					$('#zona-btn-siguiente').attr('disabled','disabled');
					$('#zona-btn-ultimo').attr('disabled','disabled');
				}else{
					$('#zona-btn-anterior').attr('disabled','disabled');
					$('#zona-btn-primero').attr('disabled','disabled');
				}
			}else{
				$("#codigo_zona").val(response.id);
				$("#nombre_zona").val(response.nombre);
				$("#descripcion_zona").val(response.descripcion);
				$("#zona-btn-guardar").removeAttr('disabled');
				$("#zona-btn-eliminar").removeAttr('disabled');
			}
		},
		error: function(xhr, status) {
			errors(xhr);          
		},
	});
}
function limpiar_campos_zonas(name){	
	$("#codigo_zona").val("");
	$("#nombre_zona").val("");
	$("#descripcion_zona").val("");
}
function opciones_zona(opcion){
	switch(opcion){
		case "inicializar"://--------------------------------------------------------------------------	
			//keydown	  
		    $("#codigo_zona").keydown(function(event) {
		        
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
			$("#codigo_zona").keypress(function(event) {
				var keycode = (event.keyCode ? event.keyCode : event.which);
				table_zona.fnFilter('');
					if(keycode == '13'){//por si presionan ENTER					
						opciones_zona("buscar");
					}
				});
			$("#codigo_zona").focus(); 
			break;
			case "guardar":	//--------------------------------------------------------------------------
			if ($("#nombre_zona").val().length == 0) {
				alert("Campo nombre es obligatorio");
			}else  {
				//Es una edicion o nuevo registro?
					if (nuevo_zona) {//nuevo
						form = $('#form-store-zonas');   
						url = form.attr('action'); 
						$.ajax({
							url: url,
							type: 'POST',
							data: form.serialize(),
							success: function(response) {   
								alert(response.msg);
								opciones_zona("nuevo");
							},
							error: function(xhr, status) {
								errors(xhr);								
							},
						});
					}else{//editar
						form = $('#form-update-zonas');   
						url = form.attr('action').replace(':ID',$("#codigo_zona").val());						
						var data = { _token:CSRF_TOKEN, 
							nombre: $("#nombre_zona").val(), 
							descripcion:$("#descripcion_zona").val() 
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
			$("#zona-btn-guardar").removeAttr('disabled');
			$('#zona-btn-eliminar').attr('disabled','disabled');
			$('#zona-btn-anterior').attr('disabled','disabled');
			$('#zona-btn-siguiente').attr('disabled','disabled');			
			$('#zona-btn-primero').attr('disabled','disabled');			
			$('#zona-btn-ultimo').attr('disabled','disabled');

				//busca el ultimi id + 1
				nuevo_zona = true;	
				limpiar_campos_zonas("zonas");
				form = $('#form-create-zonas');   
				url = form.attr('action'); 
				$.ajax({
					url: url,
					type: 'GET',
					data: form.serialize(),
					success: function(response) {   

						$("#codigo_zona").val(response.data);		
						$("#codigo_zona").prop("readonly", true);
						$('#zona-btn-buscar').attr('disabled','disabled');
						$("#nombre_zona").focus(); 
					},
					error: function(xhr, status) {
						errors(xhr);
					},
				});	
				break;
				case "editar"://--------------------------------------------------------------------------
				table_zona.fnFilter('');
				limpiar_campos_zonas("zonas");
				$("#codigo_zona").focus(); 
				$("#codigo_zona").prop("readonly", false);
				$('#zona-btn-buscar').removeAttr('disabled');
				$("#zona-btn-guardar").attr('disabled','disabled');
				$("#zona-btn-eliminar").attr('disabled','disabled');
				$('#zona-btn-anterior').removeAttr('disabled');
				$('#zona-btn-siguiente').removeAttr('disabled');			
				$('#zona-btn-primero').removeAttr('disabled');			
				$('#zona-btn-ultimo').removeAttr('disabled');				
				nuevo_zona = false;			
				break;
				case "buscar"://--------------------------------------------------------------------------

					if ($("#codigo_zona").val().length == 0) {//busca a todos los registros
						$('#zona-btn-buscar').attr('disabled','disabled');
						$("#codigo_zona").prop("readonly", false);
						buscar_zonas("zonas");						
					}else{//busqueda por codigo
						form = $('#form-edit-zonas'); 
						url = form.attr('action').replace(':ID',$("#codigo_zona").val()); 
						$.ajax({
							url: url,
							type: 'GET',
							data: form.serialize(),
							success: function(response) {
								if (response.data != null) {
									$("#codigo_zona").val(response.data.id);
									$("#codigo_zona").prop("readonly", true);
									$("#nombre_zona").val(response.data.nombre);
									$("#descripcion_zona").val(response.data.descripcion);								
									$('#zona-btn-buscar').attr('disabled','disabled');
									$("#zona-btn-eliminar").removeAttr('disabled');
									$("#zona-btn-guardar").removeAttr('disabled');
								}else{					
									alert("Este codigo no existe en la base de datos");
									$("#codigo_zona").focus(); 
								}				
							},
							error: function(xhr, status) {
								errors(xhr);
							},
						});
					}
					break;

				case "eliminar"://--------------------------------------------------------------------------
				if ($("#nombre_zona").val().length == 0) {
					alert("Debe de editar un registro");
				}else  {
					
					if (confirm('Desea eliminar este registro')) {						
						form = $('#form-deletes-zonas');   
						url = form.attr('action').replace(':ID',$("#codigo_zona").val()); 
						$.ajax({
							url: url,
							type: 'DELETE',
							data: form.serialize(),
							success: function(response) {						
								if (response.status == "true") {								
									opciones_zona("editar");
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
				$("#texto-modal-ayuda-zonas").empty();
				$("#texto-modal-ayuda-zonas").append(txt_ayuda("zonas"));
				$("#modal_ayuda_zonas").modal("show");
				break; 

			}
		}

		

