@extends('frmPrensa',['post'=>'prensa-internacional'])

@section('title','Internacional')

@section('checkbox')

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="ARISTEGUI">
  <label class="form-check-label" for="ARISTEGUI">
    ARISTEGUI NOTICIAS (MEX)
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="bbc">
  <label class="form-check-label" for="bbc">
    BBC
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="elpais">
  <label class="form-check-label" for="elpais">
    EL PAÍS GLOBAL
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="miami">
  <label class="form-check-label" for="miami">
    MIAMI HERALD
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="newyork">
  <label class="form-check-label" for="newyork">
    EL NEW YORK TIMES
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="universal">
  <label class="form-check-label" for="universal">
    EL UNIVERSAL (MÉXICO)
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="miami">
  <label class="form-check-label" for="miami">
    WASHINGTON POST
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="miami">
  <label class="form-check-label" for="miami">
    BOSTON GLOBE
  </label>
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