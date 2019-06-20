@extends('layouts.app')

@section('content')
        <div class="page-content">
            <form action="">
            <div class="row">
                Email: <input type="email" name="" id="">
            </div>
            <div  class="row">
                Fecha del día que se analiza: <input type="date" name="" id="">
            </div>                
               

                @yield('checkbox')
            </form>
        </div>
          
@endsection
