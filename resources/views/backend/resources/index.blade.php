@extends('layouts.backend')
@section('content')
    <div id="title" class="col80">
        Administración de recursos
    </div>
    <div id="contentbutton" class="col20">
        <input type="button" value="Añadir Recursos">
    </div>
    <div id="content" class="col100">
                <div class="col25">Titlo</div>
                <div class="col25">Miniatura</div>
                <div class="col25">Eliminar</div>
                <div class="col25">Editar</div>
            @foreach ($resources as $resources )
                <div id="{{$resources->id}}">
                <div class="col25">{{$resources->title}}</div>
                <div class="col25">Miniatura</div>
                <div class="col25"><span id="{{$resources->id}}" class="delete">Eliminar</span></div>
                <div class="col25"><a href='/resources/{{$resources->id}}/edit'>Modificar</a> </div> 
                </div>
            @endforeach
    </div>
    <div id="contentmodal">
        <div id="windowsmodarl">
            <form action="/resources" method="post" enctype="multipart/form-data">
            @csrf
                <br /> Titlo:<br /> <input type='text' name='title'><br />
                <br /> Descripción:<br /> <input type='text' name='description'><br />
                <br /> Tipo:<br /> <input type='text' name='type'><br />
                <br /> Ruta:<br /> <input type='text' name='route'><br />
                <br /> <input type="submit" value="Añadir Recurso">
            </form>
        </div>
</div>
<script>
            $(function(){
                //.delete es el nombre de la clase
                //peticion_http es el objeto que creamos de Ajax
                $(".delete").click(function(){
                    id = $(this).attr("id");
                    elementoD = $(this);
                    var confirmacion = confirm("¿Esta seguro de que desea eliminarlo?")
                    if(confirmacion){
                    $.get('http://celia-tour.test/resources/delete/'+id, function(respuesta){
                        $(elementoD).parent().parent().remove();
                    });
                    }
                })
            })
        </script>
@endsection