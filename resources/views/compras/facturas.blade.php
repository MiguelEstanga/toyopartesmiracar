@extends('layout.app')

@section('contenido')
    <section class="container">

        <x-titulo titulo="Compras de inventario" />

        <div>
            @if (session('mensage'))
                <div class="alert alert-warning">
                    {{ session('mensage') }}
                </div>
            @endif
            <div>
                <form action="">
                    <div class="container-sm">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <button class="btn">buscar</button>
                            </span>
                            <input name="fecha" type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                          </div>


                    </div>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Total</th>
                        <th scope="col">Fecha de compra</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ( $facturas as $factura )


                        <tr>

                                @csrf
                                <td>
                                   {{$factura->producto}}
                                </td>
                                <td>
                                   {{$factura->cantidad}}
                                </td>
                                <td>
                                  {{$factura->precio}}
                                </td>
                                <td>
                                    {{$factura->total}}
                                </td>
                                <td>
                                    {{$factura->created_at}}
                                </td>



                        </tr>

                    @endforeach


                </tbody>
            </table>

        </div>

    </section>

@endsection
