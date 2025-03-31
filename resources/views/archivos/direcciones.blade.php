@extends('templete')
<div class="container col-8">
    <div class="card m-4 justify-center">
        <div class="card-body">
            <table class="table table">
                <thead>
                    <tr>
                        <th>Direcciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($direcciones as $direccion)
                        <tr>
                            <td><a href="/areas/{{ $direccion->id_direccion }}">{{ $direccion->direccion_nombre }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>