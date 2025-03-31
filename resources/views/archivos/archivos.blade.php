@extends('templete')
<div class="container col-8">
    <div class="card m-4 justify-center">
        <div class="card-body">
            <table class="table table">
                <thead>
                    <tr>
                        <th>Archivos</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($archivos as $archivo)
                        <tr>
                            <td><a href="/{{ $archivo->archivo_ruta }}">{{ $archivo->archivo_nombre }}</a></td>
                            <td><a href="{{ $archivo->id_archivo }}" class="btn btn-outline-primary editar"
                                    edit="{{ $archivo->archivo_nombre }}" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEditar">Editar</a></td>
                            <td><a href="/eliminar-archivo/{{ $archivo->id_archivo }}"
                                    class="btn btn-outline-danger eliminar" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Eliminar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar archivo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de eliminar este archivo?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a type="button" class="btn btn-danger" id="eliminar" href="">Sí, eliminar</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/editar-archivo" method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar archivo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="id_archivo" id="id_archivo">
                                <input type="hidden" name="id_carpeta" id="id_carpeta" value="{{ $id_carpeta }}">
                                <input type="text" name="archivo_nombre" class="form-control" id="archivo_nombre"
                                    value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>

    $(".eliminar").click(function (e) {
        e.preventDefault();
        ruta = $(this).attr('href');
        $("#eliminar").attr('href', ruta);
    });
    $(".editar").click(function (e) {
        e.preventDefault();
        $("#id_archivo").val($(this).attr('href'));
        $("#archivo_nombre").val($(this).attr('edit'));
    });    

</script>