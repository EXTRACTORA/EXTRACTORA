<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <a href="javascript:void(0)"  onclick="nuevo('plantaciones')" title="Adicionar" class="btn barra"><span class="glyphicon glyphicon-file"></span></a>
    <a href="javascript:void(0)" onclick="editar('plantaciones');" title="Modificar" class="btn barra"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="javascript:void(0)" id="plantacion-btn-buscar" onclick="buscar('plantaciones');" title="Buscar" class="btn barra"  disabled><span class="glyphicon glyphicon-search"></span>
        <a href="javascript:void(0)" id="plantacion-btn-guardar" onclick="guardar('plantaciones');" title="Guardar" class="btn barra" disabled><span class="glyphicon glyphicon-floppy-disk" ></span></a>    
        <a href="javascript:void(0)" id="plantacion-btn-eliminar" onclick="eliminar('plantaciones');" title="Eliminar" class="btn barra" disabled><span class="glyphicon glyphicon-trash"></span></a>
        <a href="javascript:void(0)" onclick="ir('plantaciones','ir_primero');" id="plantacion-btn-primero" title="Ir a primero" class="btn barra"><span class="glyphicon glyphicon-fast-backward"></span> </a></a>
        <a href="javascript:void(0)" onclick="ir('plantaciones','ir_anterior');" title="Ir anterior" id="plantacion-btn-anterior" class="btn barra"><span class="glyphicon glyphicon-backward"></span> </a>
        <a href="javascript:void(0)" onclick="ir('plantaciones','ir_siguiente');" id="plantacion-btn-siguiente" title="Ir a siguiente" class="btn barra"><span class="glyphicon glyphicon-forward"></span> </a>
        <a href="javascript:void(0)" onclick="ir('plantaciones','ir_ultimo');" id="plantacion-btn-ultimo" title="Ir a ultimo" class="btn barra"><span class="glyphicon glyphicon-fast-forward"></span> </a>
        <a href="javascript:void(0)" onclick="imprimir('plantaciones');" title="Imprimir" class="btn barra" disabled><span class="glyphicon glyphicon-print" ></span> </a>
        <a href="javascript:void(0)" onclick="ayuda('plantaciones');" title="Ayuda" class="btn barra_ayuda"><span class="glyphicon glyphicon-question-sign" ></span></a>
    </div> 
</div>