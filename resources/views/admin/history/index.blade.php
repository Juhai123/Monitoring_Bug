@extends('layouts.admin')

@section("content")
    <div class="pagetitle">
        <h1>History</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">History</li>
</ol>
        </nav>
    </div>

    <section class="section">
    <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data History</h4>
                <br>
                
  <div class="table-responsive">
 <table class="table">
  <div class="text-center">
  <thead>
    <tr>
      <th>No</th>
      <th>Date</th>
      <th>User</th>
      <th>Log</th>
    </tr>
  </thead>
<tbody>
  @foreach ($logs as $log)
  <tr>
    <td scope="row">{{$loop->iteration}}</td>
    <td>{{$log->created_at}}</td>
    <td>{{$log->causer->name}}</td>
    <td>{{$log->description}}</td>
  </tr>
  @endforeach
</tbody>
  </div>
 </table>
  </div>
            </div>
    </div>
</section>


    @endsection