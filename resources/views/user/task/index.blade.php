@extends('layouts.user')

@section("content")
    <div class="pagetitle">
        <h1>Task</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Task</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <br>

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Bug Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td scope="row">{{ $task->bug->name }}</td>
                                    <td scope="row">{{ $task->bug->description }}</td>
                                    <td scope="row">
                                    @if($task->status == "PENDING")
                                    <span class="badge bg-secondary">{{$task->status}}</span>
                                    @elseif($task->status == "WAITING APPROVAL")
                                    <span class="badge bg-primary">{{$task->status}}</span>
                                    @elseif($task->status == "APPROVED")
                                    <span class="badge bg-success">{{$task->status}}</span>
                                    @elseif($task->status == "REJECTED")
                                    <span class="badge bg-danger">{{$task->status}}</span>
                                    @endif
                                    </td>
                                    <td scope="row">
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
                        <form action="{{ route('user.task.update', $task->id) }}" method="post">
                            @csrf
                            @if (@$task)
                                @method('PUT')
                            @endif
                    <div class="form-group mt-3">
                                <label for="">Bug Name</label>
                                <input type="text" name="name" class="form-control" required="" value="{{ $task->bug->name ?? '' }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="" rows="3">{{ $task->bug->description ?? '' }}</textarea>
                            </div>
                            <div class="form-group mt-3">
                <label for="">Status</label>
                <select class="form-select" name="status" id="floatingSelect" aria-label="Floating label select example" value="{{ $task->status ?? '' }}">
                        <option selected> -- Choose --</option>
                        <option value="pending">PENDING</option>
                        <option value="waiting approved">WAITING APPROVAL</option>
                        <option value="approved">APPROVED</option>
                        <option value="rejected">REJECTED</option>
                    </select>
                </div>
                     
                            <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            
                           
                        </form>
                   
                </div>
                </div>
            </div>
</div>


                 </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </section>
@endsection

