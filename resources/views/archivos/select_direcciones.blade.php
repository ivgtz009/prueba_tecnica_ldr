@foreach ($direcciones as $direccion)
    <option value="{{ $direccion->id_direccion }}">{{ $direccion->direccion_nombre }}</option>
@endforeach