@extends('layouts.account')
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js" integrity="sha256-+q+dGCSrVbejd3MDuzJHKsk2eXd4sF5XYEMfPZsOnYE=" crossorigin="anonymous"></script>
    <script>
      var newUsers = {!! $newUsers !!},
        newProducts = {!! $newProducts !!},
        ctx = $("#myChart"),
        data = {
          type: 'line',
          easing: 'easInOutBounce',
          data: {
            datasets: [
              {
                label: 'New Users',
                data: newUsers,
                backgroundColor: "rgba(30,99,255,0.2)",
                borderColor: "rgba(30,99,255,1)",
                pointBackgroundColor: "rgba(179,181,198,1)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(179,181,198,1)",
                lineTension:0
              },
              {
                label: 'New Products',
                data: newProducts,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                pointBackgroundColor: "rgba(255,99,132,1)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(255,99,132,1)",
                lineTension:0
              }
            ]
          },
          options: {
            scales: {
              yAxes:[{
                ticks: {
                  min: 0
                }
              }],
              xAxes: [{
                type: 'time',
                position: 'bottom',
                time: {
                  unit: 'day'
                }
              }]
            }
          }
        };

      console.log(typeof dataArray);

      var myLineChart = new Chart(ctx, data)
    </script>
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard - Welcome {{ Auth::user()->name }}</div>
        <div class="panel-body">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>
@endsection
