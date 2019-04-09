@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{-- {{ trans('adminlte_lang::message.home') }} --}}
@endsection


@section('main-content')
<div class="container-fluid spark-screen">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="page-wrapper">
					<div class="nth-tabs" id="main-tabs">
					</div>
				</div>
				<div style="margin-top:20px;">
					<div style="line-height:50px;">	
						<button type="button" class="btn btn-primary" id="add-tab-content">Add New Tab</button>
						<button type="button" class="btn btn-primary" id="add-tab-url">Add New URL</button>
						<button type="button" class="btn btn-primary" id="add-tabs">Bulk Create</button>
						<button type="button" class="btn btn-info" onclick="nthTabs.setActTab('role-manage');">Set Active Tab</button>
						<button type="button" class="btn btn-info" onclick="nthTabs.toggleTab('menu-manage')">Toggle Tab</button>
						<button type="button" class="btn btn-info" onclick="nthTabs.locationTab('home')">Locate Tab</button>
						<button type="button" class="btn btn-danger" onclick="nthTabs.delTab('role-manage')">Close Tab</button>
						<button type="button" class="btn btn-danger" onclick="nthTabs.delOtherTab()">Close Others</button>
						<button type="button" class="btn btn-danger" onclick="nthTabs.delAllTab()">Close All</button>
						<button type="button" class="btn btn-warning" onclick="$('.roll-nav-left').click()">Scroll Left</button>
						<button type="button" class="btn btn-warning" onclick="$('.roll-nav-right').click()">Scroll Right</button>
						<button type="button" class="btn btn-success" onclick="alert(nthTabs.getMarginStep())">Get Step</button>
						<button type="button" class="btn btn-success" onclick="alert(nthTabs.getActiveId())">Get Current ID</button>
						<button type="button" class="btn btn-success" onclick="alert(nthTabs.getAllTabWidth())">Get Width</button>
						<button type="button" class="btn btn-success" onclick="console.log(nthTabs.getTabList());alert(nthTabs.getTabList())">Get Tab List
						</button>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
{{-- @include('menu.plantaciones.modales.plantaciones') --}}
@endsection