@extends('frmPrensa',['post'=>'prensa-regional','ArrayTema' => $ArrayTema ])

@section('title','Regional')

@section('checkbox')

    <div class="form-group">
      <label class="control-label">Medio Analizado</label>

          <select class="form-control" name='iptMedioComunicacion'>
          @foreach ($ArrayMedioComunicacion as $objMC)
              <option value='{{$objMC->f10_rowid}}'>{{ $objMC->f10_descripcion}}</option>
          @endforeach

          </select>

    </div>




@endsection