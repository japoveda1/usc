@extends('frmPrensa',
['post'=>$Post,
'strTituloFormulario'=>$strTituloFormulario,
'ArrayEstructura'=>$ArrayEstructura])

@section('title','Internacional')

@section('checkbox')


<div class="form-group">
<label class ="caption-subject bold uppercase" for="selectMedioComunic" >Archivo de portada prensa escrita o digital</label>
        

        <div class="fileinput fileinput-new" data-provides="fileinput">
         
                   <div class="fileinput-preview fileinput-exists thumbnail" 
                   style="max-width: 200px; max-height: 150px;">
                   </div>
                    <input type="file" name="inputArchivo">
        
        </div>
</div>


@endsection
