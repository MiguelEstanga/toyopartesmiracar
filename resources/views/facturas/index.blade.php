@extends('layout.app')

@section('contenido')
   <div
    class="container margin"

   >
   <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Usuario</th>
        <th scope="col">Fecha</th>

        <th>Referencia</th>
        <th>Banco</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ( $facturas as $factura )
            <tr>
            <th scope="row">{{$factura->id}}</th>
            <td>{{$factura->usuario->name}}</td>
            <td>{{$factura->created_at}}</td>
            <td>{{$factura->referencia}}</td>
            <td>{{$factura->banco}}</td>
            <td>{{$factura->estado->estados}}</td>
            <td>
                <a href="{{route('facturas.productos' , $factura->id) }}">ver</a>
            </td>
          </tr>
        @endforeach


    </tbody>
  </table>
   </div>
@endsection
