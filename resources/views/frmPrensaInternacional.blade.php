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

<div class="form-group">
    <label for="observacion">Observación general</label>
    <textarea class="form-control" id="observacion" rows="3"></textarea>
</div>


Titulares relacionados con el tema:

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">1</th>
      <th scope="col">2</th>
      <th scope="col">3</th>
      <th scope="col">4</th>
      <th scope="col">5</th>
      <th scope="col">0</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Política nacional</th>
      <td>
        <input class="form-check-input" type="radio" name="polNal" id="inlineRadio1" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="polNal" id="inlineRadio1" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="polNal" id="inlineRadio1" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="polNal" id="inlineRadio1" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="polNal" id="inlineRadio1" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="polNal" id="inlineRadio1" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Corrupción / Judiciales</th>
      <td>
        <input class="form-check-input" type="radio" name="corrJud" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="corrJud" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="corrJud" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="corrJud" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="corrJud" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="corrJud" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Accidentes</th>
      <td>
        <input class="form-check-input" type="radio" name="accidentes" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="accidentes" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="accidentes" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="accidentes" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="accidentes" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="accidentes" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Seguridad</th>
      <td>
        <input class="form-check-input" type="radio" name="seguridad" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="seguridad" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="seguridad" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="seguridad" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="seguridad" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="seguridad" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Política internacional</th>
      <td>
        <input class="form-check-input" type="radio" name="poliInter" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="poliInter" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="poliInter" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="poliInter" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="poliInter" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="poliInter" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Economía nacional</th>
      <td>
        <input class="form-check-input" type="radio" name="econNacional" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="econNacional" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="econNacional" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="econNacional" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="econNacional" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="econNacional" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Economía internacional</th>
      <td>
        <input class="form-check-input" type="radio" name="ecoInter" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="ecoInter" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="ecoInter" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="ecoInter" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="ecoInter" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="ecoInter" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Cultura nacional</th>
      <td>
        <input class="form-check-input" type="radio" name="culNacional" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="culNacional" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="culNacional" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="culNacional" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="culNacional" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="culNacional" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Cultura internacional</th>
      <td>
        <input class="form-check-input" type="radio" name="culInter" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="culInter" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="culInter" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="culInter" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="culInter" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="culInter" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Ciencia y TIC</th>
      <td>
        <input class="form-check-input" type="radio" name="cienTic" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="cienTic" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="cienTic" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="cienTic" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="cienTic" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="cienTic" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Deportes nacional</th>
      <td>
        <input class="form-check-input" type="radio" name="deporNac" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="deporNac" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="deporNac" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="deporNac" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="deporNac" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="deporNac" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Deportes Internacional</th>
      <td>
        <input class="form-check-input" type="radio" name="deporInter" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="deporInter" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="deporInter" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="deporInter" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="deporInter" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="deporInter" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Medio ambiente</th>
      <td>
        <input class="form-check-input" type="radio" name="medioAmb" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="medioAmb" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="medioAmb" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="medioAmb" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="medioAmb" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="medioAmb" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Salud</th>
      <td>
        <input class="form-check-input" type="radio" name="salud" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="salud" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="salud" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="salud" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="salud" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="salud" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Equidad e inclusión</th>
      <td>
        <input class="form-check-input" type="radio" name="equiinclus" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="equiinclus" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="equiinclus" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="equiinclus" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="equiinclus" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="equiinclus" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Educación</th>
      <td>
        <input class="form-check-input" type="radio" name="educacion" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="educacion" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="educacion" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="educacion" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="educacion" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="educacion" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Crisis Venezuela</th>
      <td>
        <input class="form-check-input" type="radio" name="crisisVene" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="crisisVene" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="crisisVene" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="crisisVene" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="crisisVene" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="crisisVene" value="6">
      </td>
    </tr>
    <tr>
      <th scope="row">Otro tema</th>
      <td>
        <input class="form-check-input" type="radio" name="otro" value="1">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="otro" value="2">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="otro" value="3">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="otro" value="4">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="otro" value="5">
      </td>
      <td>
        <input class="form-check-input" type="radio" name="otro" value="6">
      </td>
    </tr>
  </tbody>
</table>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="ARISTEGUI">
  <label class="form-check-label" for="ARISTEGUI">
    CORRUPCIÓN / JUDICIALES
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="bbc">
  <label class="form-check-label" for="bbc">
    ACCIDENTES
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="elpais">
  <label class="form-check-label" for="elpais">
    POLÍTICA INTERNACIONAL DIFERENTE A VZLA
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="miami">
  <label class="form-check-label" for="miami">
    POLÍTICA NACIONAL
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="newyork">
  <label class="form-check-label" for="newyork">
    EQUIDAD E INCLUSIÓN
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="universal">
  <label class="form-check-label" for="universal">
    SEGURIDAD Y PAZ
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="medio">
  <label class="form-check-label" for="medio">
    MEDIO AMBIENTE
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="salud">
  <label class="form-check-label" for="salud">
    SALUD
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="cultura">
  <label class="form-check-label" for="cultura">
    CULTURA
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="deporte">
  <label class="form-check-label" for="deporte">
    DEPORTE
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="econEmp">
  <label class="form-check-label" for="econEmp">
    ECONOMÍA Y EMPRENDIMIENTO
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="ciencia">
  <label class="form-check-label" for="ciencia">
    CIENCIA - TECNOLOGÍA
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="educacion">
  <label class="form-check-label" for="educacion">
    EDUCACIÓN
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="venezuela">
  <label class="form-check-label" for="venezuela">
    VENEZUELA
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="otros">
  <label class="form-check-label" for="otros">
    OTROS
  </label>
</div>

<input type="button" value="Guardar">
@endsection