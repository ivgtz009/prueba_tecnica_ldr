@extends('templete')
<div class="container col-8">
    <div class="card m-4 justify-center">
        <div class="car-header"><a href="/empresas" class="btn btn-secondary">Ver carpetas y archivos</a></div>
        <div class="card-body">
            <form action="/guardar-archivo" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="row">
                    <div class="col mb-3">
                        <label for="empresa" class="form-label">Empresa</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="empresa"
                            id="empresa">
                            <option selected>Seleccionar</option>
                            @foreach($empresas as $empresa)
                                <option value="{{$empresa->id_empresa}}">{{$empresa->empresa_razon_social}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="direccion"
                            id="direccion">
                            <option selected>Seleccionar</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="area" class="form-label">Área</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="area" id="area">
                            <option selected>Seleccionar</option>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="tipo_archivo" class="form-label">Tipo Archivo</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="tipo_archivo"
                            id="tipo_archivo">
                            <option selected>Seleccionar</option>
                            @foreach($tipo_archivo as $tipo)
                                <option value="{{$tipo->id_tipo_archivo}}">{{$tipo->archivo_nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="carpeta" class="form-label">Carpeta</label>
                        <input class="form-control" type="text" name="carpeta" id="carpeta">
                    </div>
                    <div class="col mb-3">
                        <label for="archivo" class="form-label">Archivo</label>
                        <input class="form-control" type="file" name="archivo" id="archivo">
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" value="Guardar">
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    $("#empresa").on("change", function () {
        empresa = $(this).val();
        $.ajax({
            url: "/select-direcciones/" + empresa,
            datatype: 'html',
            success: function (data) {
                $('#direccion').html(data);
            }
        }).done(function () {
            $(this).addClass("done");
        });
    });
    $("#direccion").on("change", function () {
        direccion = $(this).val();
        $.ajax({
            url: "/select-areas/" + direccion,
            datatype: 'html',
            success: function (data) {
                $('#area').html(data);
            }
        }).done(function () {
            $(this).addClass("done");
        });
    });
</script>