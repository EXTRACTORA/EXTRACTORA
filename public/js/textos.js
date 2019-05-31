function txt_ayuda(modulo){

	switch(modulo){
		case "perfil":
		return "Texto de ayuda para mdulo de Perfiles";   
		break;
		case "grupos":
		return "Texto de ayuda para mdulo de Grupos";
		break;
		
		case "zonas":
			return "Texto de ayuda para mdulo de Zonas";
		break;
		case "ubicaciones":
			return "Texto de ayuda para mdulo de Ubicaciones";
		break;
		case "unidades_medidas":
			return "Texto de ayuda para mdulo de Unidades medidas";
		break;
			case "plantaciones":
			return "Texto de ayuda para mdulo de Plantaciones";
		break;
		case "tipo_identificaciones":
			return "Texto de ayuda para mdulo de tipo identificaciones";
		break;
		case "actividad_economicas":
			return "Texto de ayuda para mdulo de Actividad economicas";
		break;
		case "lenguaje":
		var lenguaje_datatable = {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		};
		return lenguaje_datatable
		break;
	}	
	
}