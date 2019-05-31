<!-- Modal ubicaciones-->
<div class="modal fade" id="modal_ubicaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ trans('adminlte_lang::menu.ubicaciones') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <table id="table-ubicaciones" class="table table-bordered table-hover" style="width:100%">
              <thead>
               <tr>
                <th>id</th>
                <th>Nombre</th>                   
              </tr>
            </thead>
            <tbody id="tbody_ubicaciones">
            {{--     @foreach($ubicaciones as $perfil)
                <tr data-id="{{$perfil->id}}" data-name = "{{$perfil->nombre}}">
                 <td>{{$perfil->id}}</td>
                 <td>{{$perfil->nombre}}</td>                
               </tr>
               @endforeach  --}}
             </tbody>
           </table>
         </div>
       </div>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

    </div>
  </div>
</div>
</div>