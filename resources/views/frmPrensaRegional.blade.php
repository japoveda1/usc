@extends('frmPrensa',['post'=>'prensa-regional'])

@section('title','Regional')

@section('checkbox')
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="noti5">
  <label class="form-check-label" for="noti5">
    NOTI 5
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="90minutos">
  <label class="form-check-label" for="90minutos">
    90 MINUTOS
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="telepacifico">
  <label class="form-check-label" for="telepacifico">
    TELE PACÍFICO NOTICIAS
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="cnc">
  <label class="form-check-label" for="cnc">
    CNC (TULUA)
  </label>
</div>

<div class="form-group">
    <label for="enlace">Enlace de emisión</label>
    <input type="text" class="form-control" id="enlace" aria-describedby="enlaceHelp" placeholder="Ingrese el enlace de emisión">
</div>


@endsection