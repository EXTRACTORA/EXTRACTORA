<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <a href="javascript:void(0)"  onclick="nuevo('productos')" title="Adicionar" class="btn barra"><span class="glyphicon glyphicon-file"></span></a>
    <a href="javascript:void(0)" onclick="editar('productos');" title="Modificar" class="btn barra"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="javascript:void(0)" id="producto-btn-buscar" onclick="buscar('productos');" title="Buscar" class="btn barra"  disabled><span class="glyphicon glyphicon-search"></span>

    <a href="javascript:void(0)" id="producto-btn-guardar" onclick="guardar('productos');" title="Guardar" class="btn barra" disabled><span class="glyphicon glyphicon-floppy-disk" ></span></a>    
    <a href="javascript:void(0)" id="producto-btn-eliminar" onclick="eliminar('productos');" title="Eliminar" class="btn barra" disabled><span class="glyphicon glyphicon-trash"></span></a>
    <a href="javascript:void(0)" onclick="ir('productos','ir_primero');" id="producto-btn-primero" title="Ir a primero" class="btn barra"><span class="glyphicon glyphicon-fast-backward"></span> </a></a>
    <a href="javascript:void(0)" onclick="ir('productos','ir_anterior');" title="Ir anterior" id="producto-btn-anterior" class="btn barra"><span class="glyphicon glyphicon-backward"></span> </a>
    <a href="javascript:void(0)" onclick="ir('productos','ir_siguiente');" id="producto-btn-siguiente" title="Ir a siguiente" class="btn barra"><span class="glyphicon glyphicon-forward"></span> </a>
    <a href="javascript:void(0)" onclick="ir('productos','ir_ultimo');" id="producto-btn-ultimo" title="Ir a ultimo" class="btn barra"><span class="glyphicon glyphicon-fast-forward"></span> </a>
    <a href="javascript:void(0)" onclick="imprimir('productos');" title="Imprimir" class="btn barra" disabled><span class="glyphicon glyphicon-print" ></span> </a>
    <a href="javascript:void(0)" onclick="ayuda('productos');" title="Ayuda" class="btn barra_ayuda"><span class="glyphicon glyphicon-question-sign" ></span></a>
    </div> 
  </div>