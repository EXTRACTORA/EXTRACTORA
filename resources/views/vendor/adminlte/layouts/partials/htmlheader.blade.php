<head>
  <meta charset="UTF-8">
  <title> Extractora @yield('htmlheader_title', 'Your title here') </title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- menu --}}
  {!!Html::style('css/mycss.css')!!}
  {!!Html::style('css/all.css')!!}

  {{-- grid --}}    
  {{-- {!!Html::style('css/grid/jquerysctipttop.css')!!} --}}
  {{-- {!!Html::style('css/grid/bulma.min.css')!!} --}}
  {!!Html::style('css/grid/all.min.css')!!}

  {!!Html::style('css/jquery-ui.css')!!}


  {!!Html::style('css/tab/jquerysctipttop.css')!!}
  {!!Html::style('css/tab/jquery.scrollbar.min.css')!!}
  {!!Html::style('css/tab/nth-tabs.min.css')!!}
  {!!Html::style('css/tab/nth-icons.css')!!}

  {{-- dataTables --}}
  {{-- {!!Html::style('css/jquery.dataTables.css')!!} --}}

  {{-- dataTables --}}
  {!!Html::style('css/dataTables/dataTables.min.css')!!}
  {!!Html::style('css/dataTables/dataTables.css')!!}

  <!-- tab -->
   {{--     {!!Html::style('css/font-awesome.min.css')!!}
   {!!Html::style('css/tab/all2.css')!!} --}}
{{--     {!!Html::style('css/tab/jquery.scrollbar.min.css')!!}
      {!!Html::style('css/tab/nth-tabs.min.css')!!}
      {!!Html::style('css/tab/nth-icons.css')!!} --}}
  {{--   {!!Html::style('css/tab/nth-icons.min.css')!!}
  {!!Html::style('css/tab/nth-tabs.css')!!} --}}
  



  {{-- <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" /> --}}


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
      ]) !!};
    </script>
  </head>
