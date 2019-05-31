@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection

<div class="row"  style="padding-top: 60px">
	<div class="col-md-6">
		<table class="table table-condensed table-hover datatables" >
			<thead class="thead-inverse">
				<th>Id</th>			
				<th>Nombre</th>
				<th>Universidad</th>	
				<th>editar</th>
				<th>elim.</th>				
			</thead>			
			<tbody >
				@foreach($estudiantes as $estudiante)
				<tr data-id="{{$estudiante->id}}" data-name = "{{$estudiante->nombre}}">	
					<td>{{$estudiante->id}}</td>
					<td>{{$estudiante->nombre}}</td>			
					<td>{{$estudiante->universidad->nombre}}</td>
					
					<td style=" width: 4%;">
						
						


						{{-- {!!link_to_route('estudiantes.edit',$title = '',$parameters = $estudiante->id,$attributes = ['class'=>'btn btn-primary btn-xs glyphicon glyphicon-pencil'])!!} --}}
					</td>
					
					<td style=" width: 4%;">
						{{-- <a href="javascript:void(0)"  onclick="buscar_estudiantes()" title="Adicionar" class="btn barra"><span class="glyphicon glyphicon-trash"></span></a> --}}
						

			{{-- 			{!!link_to_route('estudiantes.destroy',$title = '',$parameters = $estudiante->id,$attributes = ['class'=>'btn btn-danger btn-xs glyphicon glyphicon-trash'])!!}	 --}}

						{{-- <a href="{{ route('estudiantes.update', $estudiante->id ) }}"  title="Eliminar" class="btn barra"><span class="glyphicon glyphicon-trash"></span></a> --}}	

						<td style=" width: 4%;">


<form action="/estudiantes" enctype="multipart/form-data" method="delete">
	<button class="" type="sub"></button>
</form>	
						{{-- {!!link_to_route('estudiantes.edit',$title = '',$parameters = $estudiante->id,$attributes = ['class'=>'btn btn-danger btn-xs glyphicon glyphicon-trash'])!!} --}}					
					</td>			
					</td>				
				</tr>
				@endforeach
			</tbody>			
		</table>
	</div>
</div>

