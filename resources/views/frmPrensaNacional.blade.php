@extends('frmPrensa',['post'=>'prensa-nacional'])

@section('title','Nacional')

@section('checkbox')
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="eltiempo">
  <label class="form-check-label" for="eltiempo">
    EL TIEMPO
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="90minutos">
  <label class="form-check-label" for="90minutos">
    EL ESPECTADOR
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="telepacifico">
  <label class="form-check-label" for="telepacifico">
    SEMANA
  </label>
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