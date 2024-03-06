@extends('layouts.admin')
@section('contenido')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-tittle">Editar cliente</h3>
            </div>
            
            <form action="{{ route('clientes.update', $cliente ->id_persona) }}" method="POST" class="form">
            @csrf
            @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}" id="nombre" placeholder="Ingresa el nombre">
                    </div>
                    <div class="form-group">
                        <label for="tipo_documento">Tipo documento</label>
                        <select name="tipo_documento" class="form-control" id="tipo_documento">
                        <option value="{{$cliente->tipo_documento}}">CC</option>
                        <option value="{{$cliente->tipo_documento}}">NIT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="num_documento">Numero de documento</label>
                        <input type="text" class="form-control" name="num_documento" value="{{$cliente->num_documento}}" id="num_documento" placeholder="Ingresa el numero de documento">
                    </div>
                    <div class="form-group">
                        <label for="direccion">direccion</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" value="{{$cliente->direccion}}" placeholder="Ingresa la dirección">
                    </div>
                    <div class="form-group">
                        <label for="telefono">telefono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" value="{{$cliente->telefono}}" placeholder="Ingresa el número de telefono">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{$cliente->email}}" placeholder="Ingresa el email">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                        <button type="text" class="btn btn-danger me-1 mb-1">Cancelar</button>
                    </div>  
                </div>
            </form>
        </div>
    </div>
@stop