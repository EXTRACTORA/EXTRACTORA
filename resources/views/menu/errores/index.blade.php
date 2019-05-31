    <div class="box box-success">
     <div class="box-header with-border padin-box-header">

          <div class="row">
               <div class="col-lg-12 mb-5">
                    @include('menu.barras.errores.barra') 
               </div>
          </div>
          <div class="box-tools pull-right"> 
               <h3 class="box-title">Perfiles</h3>               
          </div>
     </div><!-- /.box-header -->
     <div class="box-body form-horizontal">
          <div class="panel panel-default" style="padding: 50px;">
               <table id="table-errores" class="table table-bordered table-hover" style="width:100%">
                    <thead class="thead-inverse">
                         <th>id</th>
                         <th>usuario</th>
                         <th>fecha</th>
                         <th>clase</th>
                         <th>funcion</th>
                         <th>mensaje</th>
                    </thead>       
                    <tbody >
                         @foreach($logs as $log)
                         <tr data-id="{{$log->id}}" data-name = "{{$log->id}}"> 
                              <td>{{$log->id}}</td>
                              <td>{{$log->user->name}}</td>                               
                              <td>{{$log->fecha}}</td>
                              <td>{{$log->clase}}</td>
                              <td>{{$log->funcion}}</td>
                              <td>{{$log->msg}}</td>                  
                         </tr>
                         @endforeach
                    </tbody>       
               </table>
          </div>
     </div>

</div>
@section('scripts')
{{-- ERRORES --}}
{!!Html::script('js/errores/errores.js')!!}
@show






