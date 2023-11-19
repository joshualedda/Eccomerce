@extends('layouts.admin')
@section('content')

 @if(session('message'))
<h2>{{ session('message') }}</h2>
@endif
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Line chart</h4>
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>


      </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChart').getContext('2d');

        function fetchDataAndUpdateChart() {
            fetch('/getChartData') // Assuming you have a route named 'getChartData' in your routes file
                .then(response => response.json())
                .then(data => {
                    const xValues = data.xValues;
                    const yValues = data.yValues;

                    new Chart(ctx, {
                        type: "line",
                        data: {
                            labels: xValues,
                            datasets: [{
                                fill: false,
                                lineTension: 0,
                                backgroundColor: "rgba(0,0,255,1.0)",
                                borderColor: "rgba(0,0,255,0.1)",
                                data: yValues
                            }]
                        },
                        options: {
                            legend: { display: false },
                            scales: {
                                yAxes: [{ ticks: { min: Math.min(...yValues) - 1, max: Math.max(...yValues) + 1 } }]
                            }
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        // Initial chart update
        fetchDataAndUpdateChart();

        // Optionally, you can set up a periodic update
        // setInterval(fetchDataAndUpdateChart, 5000); // Update every 5 seconds, for example
    });
</script>

@endsection
