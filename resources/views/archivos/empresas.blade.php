@extends('templete')
<div class="container col-8">
    <div class="card m-4 justify-center">
        <div class="card-body">
            <table class="table table">
                <thead>
                    <tr>
                        <th>Empresas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td><a href="/direcciones/{{ $empresa->id_empresa }}}">{{ $empresa->empresa_razon_social }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>