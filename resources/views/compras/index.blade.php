@extends('layout.app')

@section('contenido')
    <section class="container">

        <x-titulo titulo="Compras de inventario" />

        <div >
            @if(session("mensage"))
            <div class="alert alert-warning">
              {{session("mensage")}}
           </div>
      @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Total</th>
                    </tr>

                </thead>
                <tbody>
                    @php
                        $contador = 1;
                    @endphp
                    @foreach ($productos as $producto)
                        <tr>
                            <form action="{{ route('compras.store') }}" method="post">
                                @csrf
                                <td>
                                    <input type="text" name="id" value="{{ $producto->id }}" hidden>
                                    <input value="{{ $producto->nombre }}" class="form-control" name="producto"
                                        type="text">
                                </td>
                                <td>
                                    <input value="{{ $producto->stop < 1 ? 0 : $producto->stop }}"
                                        class="form-control cantidad" name="cantidad" value="1" type="number">
                                </td>
                                <td>
                                    <input id="precio{{ $contador }}" value="{{ $producto->precio }}"
                                        class="form-control" name="precio" type="number">
                                </td>
                                <td>
                                    <input id="total{{ $contador }}"
                                        value="{{ $producto->stop > 0 ? $producto->precio * $producto->stop : 0 }}"
                                        type="text" class="form-control" name="total" disabled>
                                </td>
                                <td>
                                    <button class="btn btn-success">
                                        Comprar
                                    </button>
                                </td>
                            </form>

                        </tr>
                        @php
                            $contador = $contador + 1;
                        @endphp
                    @endforeach


                </tbody>
            </table>

        </div>

    </section>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const cantidad = document.querySelectorAll(".cantidad")
            var contador = 1
            cantidad.forEach((items, idex) => {

                items.addEventListener("input", event => {
                    var precio_ = document.getElementById(`precio${idex + 1}`)
                    var total_ = document.getElementById(`total${idex + 1}`)

                    total_.value = precio_.value * event.target.value
                    console.log(event.target.value)
                })
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
