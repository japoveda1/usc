@extends('layouts.app')

@section('content')

<div class="page-content">

  <div class="portlet light ">
      <div class="caption font-green-sunglo">
            <span class="caption-subject bold uppercase"> {{$strMensaje}}</span>
      </div>
   
      <button>
        <a href="{{$return}}" class="nav-link ">
          <span class="title">Volver al formulario</span>
        </a>
      </button>

  </div>
</div>

          
@endsection
