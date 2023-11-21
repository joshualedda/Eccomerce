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


        <div class="container mt-5">
            <h2 class="mb-4">User Excel Export</h2>

            <!-- Form to upload Excel file -->
            <form action="{{ route('export') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="excelFile">Choose Excel File</label>
                    <input type="file" class="form-control-file" id="excelFile" name="excelFile" accept=".xlsx, .xls">
                </div>

                <button type="submit" class="btn btn-primary">Export Users</button>
            </form>
        </div>



      </div>
    </div>
</div>

@endsection
