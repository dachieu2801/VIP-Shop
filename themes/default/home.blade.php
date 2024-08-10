@extends('layout.master')
@section('body-class', 'page-home')
@section('content')

<div class="modules-box mt-4" id="home-modules-box">
  @hook('home.modules.before')

  @foreach($modules as $module)
    @include($module['view_path'], $module)
  @endforeach
  <div>{{json_encode($modules)}}</div>
{categories : [],product: []}
  @hook('home.modules.after')

</div>

@endsection



