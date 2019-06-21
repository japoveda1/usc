@extends('layouts.app')

@section('content')

<div class="page-content">
    <form action="{{$post}}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingrese Email">
        </div>
        <div class="form-group">
            <label for="fecha">Fecha del día que se analiza:</label>
            <input type="date" class="form-control" id="fecha" aria-describedby="fechaHelp" placeholder="Seleccione fecha">
        </div>
        @yield('checkbox')
    </form>
</div>
          
@endsection
