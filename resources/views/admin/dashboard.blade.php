@extends('layouts.admin')
@section('content')
    @if (session('message'))
        <h2>{{ session('message') }}</h2>
    @endif




    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sales</h5>

                    <!-- Line Chart -->
                    <canvas id="lineChart" style="max-height: 400px;"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#lineChart'), {
                                type: 'line',
                                data: {
                                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                                    datasets: [{
                                        label: 'Sales Chart',
                                        data: [65, 59, 80, 81, 56, 55, 40],
                                        fill: false,
                                        borderColor: 'rgb(75, 192, 192)',
                                        tension: 0.1
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
                        });
                    </script>
                    <!-- End Line CHart -->

                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>

                    <!-- Polar Area Chart -->
                    <canvas id="polarAreaChart" style="max-height: 400px;"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#polarAreaChart'), {
                                type: 'polarArea',
                                data: {
                                    labels: [
                                        'Red',
                                        'Green',
                                        'Yellow',
                                        'Grey',
                                        'Blue'
                                    ],
                                    datasets: [{
                                        label: 'Product Charts',
                                        data: [11, 16, 7, 3, 14],
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(75, 192, 192)',
                                            'rgb(255, 205, 86)',
                                            'rgb(201, 203, 207)',
                                            'rgb(54, 162, 235)'
                                        ]
                                    }]
                                }
                            });
                        });
                    </script>
                    <!-- End Polar Area Chart -->

                </div>
            </div>
        </div>






    </div>
@endsection
