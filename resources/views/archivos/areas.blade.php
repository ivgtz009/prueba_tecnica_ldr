@extends('templete')
<div class="container col-8">
    <div class="card m-4 justify-center">
        <div class="card-body">
            <table class="table table">
                <thead>
                    <tr>
                        <th>Areas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areas as $area)
                        <tr>
                            <td><a href="/carpetas/{{ $area->id_area }}">{{ $area->area_nombre }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>