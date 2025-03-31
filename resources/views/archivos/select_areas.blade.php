@foreach ($areas as $area)
    <option value="{{ $area->id_area }}">{{ $area->area_nombre }}</option>
@endforeach