<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
            </div>
        </div>
        @endif

        <!-- buscador form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            
            {{-- usuarios --}}
            <li class="treeview">
                <a href="#"><i class='fa fa-user'></i> <span>{{ trans('adminlte_lang::menu.usuarios') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                   <li><a href="javascript:void(0)" name="tab-perfiles" class="open_tab">{{ trans('adminlte_lang::menu.perfiles') }}</a></li>              
                   <li><a href="javascript:void(0)" name="tab-permisos" class="open_tab">{{ trans('adminlte_lang::menu.permisos') }}</a></li>
                   <li><a href="javascript:void(0)" name="tab-usuarios" class="open_tab">{{ trans('adminlte_lang::menu.usuarios') }} </a></li>                 
               </ul>
           </li>
           {{-- plantaciones --}} 
           <li class="treeview">
            <a href="#"><i class='fa fa-pagelines'></i> <span>{{ trans('adminlte_lang::menu.plantaciones') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">

                <li><a href="javascript:void(0)" name="tab-grupos" class="open_tab">{{ trans('adminlte_lang::menu.grupos') }}</a></li>
                <li><a href="javascript:void(0)" name="tab-zonas" class="open_tab">{{ trans('adminlte_lang::menu.zonas') }}</a></li>
                <li><a href="javascript:void(0)" name="tab-ubicaciones" class="open_tab">{{ trans('adminlte_lang::menu.ubicaciones') }}</a></li>
                <li><a href="javascript:void(0)" name="tab-plantaciones" class="open_tab">{{ trans('adminlte_lang::menu.plantaciones') }}</a></li>
            </ul>
        </li>
        {{-- Vehiculo --}}
        <li class="treeview">
            <a href="#"><i class='fa fa-truck'></i> <span>{{ trans('adminlte_lang::menu.vehiculos') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="javascript:void(0)" name="tab-tipo-vehiculo" class="open_tab">{{ trans('adminlte_lang::menu.tipo_vehiculos') }}</a></li>                    
                <li><a href="javascript:void(0)" name="tab-vehiculos" class="open_tab">{{ trans('adminlte_lang::menu.vehiculos') }}</a></li>                  
            </ul>
        </li>
        {{-- Productos --}}
        <li class="treeview">
            <a href="#"><i class='fa fa-product-hunt'></i> <span>{{ trans('adminlte_lang::menu.productos') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="javascript:void(0)" name="tab-clase-productos" class="open_tab">{{ trans('adminlte_lang::menu.clases') }}</a></li>
                <li><a href="javascript:void(0)" name="tab-productos" class="open_tab">{{ trans('adminlte_lang::menu.productos') }}</a></li>                  
            </ul>
        </li>
        {{-- Terceros --}}
        <li class="treeview">
            <a href="#"><i class='fa fa-users'></i> <span>{{ trans('adminlte_lang::menu.terceros') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="javascript:void(0)" name="tab-tipo-tercero" class="open_tab">{{ trans('adminlte_lang::menu.tipo_terceros') }}</a></li>
                <li><a href="javascript:void(0)" name="tab-tercero" class="open_tab">{{ trans('adminlte_lang::menu.terceros') }}</a></li>                  
            </ul>
        </li>
        {{-- Paradas --}}
        <li class="treeview">
            <a href="#"><i class='fa fa-hand-paper-o'></i> <span>{{ trans('adminlte_lang::menu.paradas') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="javascript:void(0)" name="tab-tipo-parada" class="open_tab">{{ trans('adminlte_lang::menu.tipo_paradas') }}</a></li>
                <li><a href="javascript:void(0)" name="tab-parada" class="open_tab">{{ trans('adminlte_lang::menu.paradas') }}</a></li>                  
            </ul>
        </li>
        {{-- Equipos --}}
        <li class="treeview">
            <a href="#"><i class='fa fa-cogs'></i> <span>{{ trans('adminlte_lang::menu.equipos') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">                    
                <li><a href="javascript:void(0)" name="tab-fase-proceso" class="open_tab">{{ trans('adminlte_lang::menu.fases_proceso') }}</a></li>   
                <li><a href="javascript:void(0)" name="tab-equipos" class="open_tab">{{ trans('adminlte_lang::menu.equipos') }}</a></li>
            </ul>
        </li>
        {{-- Generales --}}
        <li class="treeview">
            <a href="#"><i class='fa fa-object-group'></i> <span>{{ trans('adminlte_lang::menu.generales') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="javascript:void(0)" name="tab-unidades-medida" class="open_tab">{{ trans('adminlte_lang::menu.unidades_medida') }}</a></li>
                <li><a href="javascript:void(0)" name="tab-divicion-geografica" class="open_tab">{{ trans('adminlte_lang::menu.division_geografica') }}</a></li>   
                <li><a href="javascript:void(0)" name="tab-tipos-identiicacion" class="open_tab">{{ trans('adminlte_lang::menu.tipos_identificacion') }}</a></li>
            </ul>
        </li>            
    </ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>
