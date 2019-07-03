@extends('frmPrensa',
['post'=>$Post,
'strTituloFormulario'=>$strTituloFormulario,
'ArrayEstructura'=>$ArrayEstructura])

@section('title','Internacional')

@section('checkbox')



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