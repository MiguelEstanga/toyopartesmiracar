@extends('layout.app')

@section('contenido')
   <div
    class="container margin "
   >
   <table class="table">
    <thead>
      <tr>

        <th scope="col">Nombre del artículo</th>
        <th scope="col">Cantidad vendida</th>
        <th scope="col">Precio unitario</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
        @php
            $pago = 0;
        @endphp
        @foreach ( $productos as $producto )
            <tr>
            <td>
                {{$producto["nombre"]}}
            </td>
            <td>
                {{$producto["cantidad"]}}
            </td>
            <td>
                {{$producto["precio"]}}
            </td>
            <td>
                {{$producto["total"]}}
            </td>
          </tr>
        @endforeach
        <tr>
            <td colspan="2" >

            </td>
            <td  >
                Información de la tranferencia
            </td>
        </tr>
        <tr>

            <td colspan="2">Total</td>
            <td>{{$total}}</td>
        </tr>
        <tr>
            <td colspan="2">Estado</td>
            <td>{{$estado}}</td>
        </tr>
        <tr>
            <td colspan="2">Cliente</td>
            <td>{{$usuario}}</td>
        </tr>
        <tr>
            <td colspan="2">Fecha</td>
            <td>{{$fecha}}</td>
        </tr>
        <tr>
            <td colspan="2">Número de referencia</td>
            <td>{{$referencia}}</td>
        </tr>
        <tr>
            <td colspan="2">Banco</td>
            <td>{{$banco}}</td>
        </tr>
        <tr>
            <td colspan="2">Acción</td>
            <td>
                <form action="{{route('facturas.actulizar' , $factura_id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <select name="estado" class="form-control" >
                                @foreach ( $estados as $_estado )
                                    <option
                                        value="{{$_estado->id}}"
                                        {{
                                            $_estado->id == $estado_id ? "selected" :""
                                        }}

                                    >
                                        {{$_estado->estados}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button href="" class="btn btn-primary" >
                                Enviar
                            </button>
                        </div>

                    </div>

                </form>

            </td>
        </tr>


    </tbody>
  </table>
   </div>
@endsection
