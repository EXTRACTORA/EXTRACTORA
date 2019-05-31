<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <a href="javascript:void(0)"  onclick="nuevo('ubicaciones')" title="Adicionar" class="btn barra"><span class="glyphicon glyphicon-file"></span></a>
    <a href="javascript:void(0)" onclick="editar('ubicaciones');" title="Modificar" class="btn barra"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="javascript:void(0)" id="ubicacion-btn-buscar" onclick="buscar('ubicaciones');" title="Buscar" class="btn barra"  disabled><span class="glyphicon glyphicon-search"></span>

    <a href="javascript:void(0)" id="ubicacion-btn-guardar" onclick="guardar('ubicaciones');" title="Guardar" class="btn barra" disabled><span class="glyphicon glyphicon-floppy-disk" ></span></a>    
    <a href="javascript:void(0)" id="ubicacion-btn-eliminar" onclick="eliminar('ubicaciones');" title="Eliminar" class="btn barra" disabled><span class="glyphicon glyphicon-trash"></span></a>
    <a href="javascript:void(0)" onclick="ir('ubicaciones','ir_primero');" id="ubicacion-btn-primero" title="Ir a primero" class="btn barra"><span class="glyphicon glyphicon-fast-backward"></span> </a></a>
    <a href="javascript:void(0)" onclick="ir('ubicaciones','ir_anterior');" title="Ir anterior" id="ubicacion-btn-anterior" class="btn barra"><span class="glyphicon glyphicon-backward"></span> </a>
    <a href="javascript:void(0)" onclick="ir('ubicaciones','ir_siguiente');" id="ubicacion-btn-siguiente" title="Ir a siguiente" class="btn barra"><span class="glyphicon glyphicon-forward"></span> </a>
    <a href="javascript:void(0)" onclick="ir('ubicaciones','ir_ultimo');" id="ubicacion-btn-ultimo" title="Ir a ultimo" class="btn barra"><span class="glyphicon glyphicon-fast-forward"></span> </a>
    <a href="javascript:void(0)" onclick="imprimir('ubicaciones');" title="Imprimir" class="btn barra" disabled><span class="glyphicon glyphicon-print" ></span> </a>
    <a href="javascript:void(0)" onclick="ayuda('ubicaciones');" title="Ayuda" class="btn barra_ayuda"><span class="glyphicon glyphicon-question-sign" ></span></a>
    </div> 
  </div>