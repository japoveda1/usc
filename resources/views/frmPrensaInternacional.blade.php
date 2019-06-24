@extends('frmPrensa',['post'=>'prensa-internacional'])

@section('title','Internacional')

@section('checkbox')

<div class="form-group">
      <label class="control-label">Medio Analizado</label>

          <select class="form-control" name='iptMedioComunicacion'>
          @foreach ($ArrayMedioComunicacion as $objMC)
              <option value='{{$objMC->f10_rowid}}'>{{ $objMC->f10_descripcion}}</option>
          @endforeach

          </select>

    </div>

<div class="form-check">
  <input type="text" class="form-control" placeholder="Otros">
</div>

<span>Archivo de portada prensa escrita o digital</span>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputUpload">Subir</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputUpload" aria-describedby="inputUpload">
    <label class="custom-file-label" for="inputUpload">Escoja un Archivo</label>
  </div>
</div>


@endsection