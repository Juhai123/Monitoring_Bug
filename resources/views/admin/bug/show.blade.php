@extends('layouts.admin')

@section('content')
<div class="pagetitle">
        <h1>Bug</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Task</li>
            </ol>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" name="" id="" href="{{ route('admin.bug.index') }}">Back</a></div>
        </nav>
    </div>

    <!--card show bug-->
    <section class="section">
            <div class="card">
                <div class="card-body mt-3">
                <h4 class="card-title">Show Bug</h4>

                <div class="row">
                    <div class="col-md-5">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $bug->name }} </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $bug->description }} </td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td>@if($bug->image)
                                        <img src="{{ asset('storage/'. $bug->image) }}" width="128px">
                                         @else
                                         No Image
                                         @endif
                                        </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>@if($bug->status =="SOLVED")
                                    <span class="badge bg-success">{{$bug->status}}</span>
                                    @elseif($bug->status == "NO SOLVED")
                                    <span class="badge bg-danger text-light">{{$bug->status}}</span>
                                    @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                </div>
            </div>
    </section>
    <!--card end show bug-->

    <!--card task-->
 <section>
        <div class="card">
            <div class="card-body col-md-4">
                <h4 class="card-title">Task</h4>
               
                <strong>Pilih user untuk ditambahkan di task diatas :</strong>
                 <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">

                <form action="{{ route('admin.task.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="bug_id" value="{{ $bug->id }}">
                    <div class="form-group mt-3">
                    <select class="form-select"name="user_id" id="" >
                    <option disabled value="">Pilih Programmer</option>
                    @foreach ($users as $user)
                    <option value=" {{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                    </select>
                    <div class="col-lg-3">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                   
                </div>
                </div>
                </form>

          </div>
        </div>
            </div>
        </div> 
              
    </section>
   
    <!--card end task-->

    <!--card task-->
    <section>
        <div class="card">
            <div class="card-body mt-3">
                <h4 class="card-title">Tabel Task</h4>
                <table class="table datatable">
                        <thead>
                        
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($task as $task)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $task->user->name }}</td>
                                <td>@if($task->status == "PENDING")
                                    <span class="badge bg-secondary">{{$task->status}}</span>
                                    @elseif($task->status == "WAITING APPROVED")
                                    <span class="badge bg-primary">{{$task->status}}</span>
                                    @elseif($task->status == "APPROVED")
                                    <span class="badge bg-success">{{$task->status}}</span>
                                    @elseif($task->status == "REJECTED")
                                    <span class="badge bg-danger">{{$task->status}}</span>
                                    @endif
                                </td>
                                <td>{{ $task->start }}</td>
                                <td>{{ $task->end }}</td>
                                <td>
                                     <!-- Modal -->
                                     <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#basicModal-{{ $task->id }}">
                                        Show <i class="bi bi-eye-fill"></i></a>
                                    </button>

                               
  
       <!-- Modal -->
       <div class="modal fade" id="basicModal-{{ $task->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.task.update', $task->id) }}" method="post">
                            @csrf
                            @if (@$task)
                                @method('PUT')
                            @endif
                            <input type="hidden" name="bug_id" value="{{ $bug->id }}">
                            <div class="form-group mt-3">
                                <label for="">Bug Name</label>
                                <input type="text" class="form-control"  name="user_id" id="" value="{{ $bug->name ?? ''}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="" rows="3">{{ $bug->description ?? '' }}</textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Status</label>
                                <select class="form-select" name="status" id="floatingSelect" aria-label="Floating label select example" value="{{ $task->status ?? '' }}">
                                <option selected> -- Choose --</option>
                        <option value="pending">PENDING</option>
                        <option value="waiting approval">WAITING APPROVAL</option>
                        <option value="approved">APPROVED</option>
                        <option value="rejected">REJECTED</option>
                    </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer d-none">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
       </div>

   
    </td>
                            </tr>
                        </tbody>
                        @endforeach
                        </table>   
            </div>
        </div> 
    </section>
    <!--card end task-->
    @endsection

    