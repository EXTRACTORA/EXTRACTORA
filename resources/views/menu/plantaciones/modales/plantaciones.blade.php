{{-- listado de plantaciones --}}
<div class="modal fade" id="modal_listar_plantaciones">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Seleccionar plantacion</h4>
			</div>
			<div class="modal-body" style="overflow-y: scroll;">				

					<div class="row" >
						<div class="col-md-12">
							<table class="table able table-condensed table-hover datatables"  id="tabla_plantaciones">
								<thead class="thead-inverse">				
									<th >nombre</th>
									<th >Zona</th>
									<!-- <th >Grupo</th> -->
									<th >Ubicacion</th>							
								</thead>
								<tbody >
							 	@foreach($plantaciones as $plantacion)
										<tr data-id="{{$plantacion->id}}" data-name = "{{$plantacion->nombre}}">
										<td>{{$plantacion->nombre}}</td>
									{{--	<td>{{$plantacion->zona->nombre}}</td>
										<!-- <td>{{$plantacion->grupo->nombre}}</td> -->
										<td>{{$plantacion->ubicacion->nombre}}</td>--}}
									</tr> 
									@endforeach	
								</tbody>				
							</table>
						</div>
					</div>
				</div>		
		</div>
	</div>
</div>

