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

        <th scope="col">Cantidad</th>
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
            <th scope="row">1</th>
            <td>
                {{$producto->producto->nombre}}
            </td>
            <td>
                {{$producto->cantidad}}
            </td>
            <td>
                {{$producto->precio}}
            </td>
            <td>
                {{$producto->total}}
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

            <td colspan="4">Total</td>
            <td>{{$total}}</td>
        </tr>
        <tr>
            <td colspan="4">Estado</td>
            <td>{{$estado}}</td>
        </tr>
        <tr>
            <td colspan="4">Cliente</td>
            <td>{{$usuario}}</td>
        </tr>
        <tr>
            <td colspan="4">Fecha</td>
            <td>{{$fecha}}</td>
        </tr>
        <tr>
            <td colspan="4">Número de referencia</td>
            <td>{{$numero}}</td>
        </tr>
        <tr>
            <td colspan="4">Banco</td>
            <td>{{$banco}}</td>
        </tr>
        <tr>
            <td colspan="4">Acción</td>
            <td>
                <form action="{{route('facturas.actulizar' , $factura_id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button href="" class="btn btn-primary" >
                        Aprobar o rechazar
                    </button>
                </form>

            </td>
        </tr>


    </tbody>
  </table>
   </div>
@endsection
