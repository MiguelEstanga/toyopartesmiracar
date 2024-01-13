@extends('layout.app')

@section('contenido')
<section class="container">

    <x-titulo titulo="Estadísticas de   ventas" />

    <div class="canvas">
        <canvas id="myChart"></canvas>
    </div>

</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');



  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: @json($data_nombre),
      datasets: [{
        label: 'Productos vendidos',
        data: @json( $data_ventas),
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>




<style>
    .canvas{

        width: 100%;
        height: 100%;
    }
    .action{
        display: flex;
        gap: 5px;
        justify-content:space-between ;
        margin-top: 10px;
    }
    btn-action{
        background-color: #17202A;
        color:#FBFCFC ;
        width: 50px;
        height: 30px;
        display: block;
        border: solid 1px black;
        border-radius: 10px;
        text-decoration: none;
    }
  .conten-data{

    flex-direction: grid;
    grid-template-columns: repeat(2,1fr);
  }
  .data{
    font-size: 15px;

  }
    .margin {
        margin: 100px auto;
    }

    .container {
        max-width: 900px;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .6);
        background-color: #FDFEFE;
        color: :#ffff;
        margin:40px auto;
    }

    .contenerdor {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        box-shadow: rgba(0, 0, 0, .7);
        width: 100%;
    }

    .contenerdor {
        background-color: '#FDFEFE';
        margin: 100px auto;
        max-width: 1200px;
    }
</style>
@endsection
