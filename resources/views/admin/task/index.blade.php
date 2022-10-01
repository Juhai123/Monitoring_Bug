@extends('layouts.admin')

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
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary" name="" id="" href="{{ route('admin.task.create') }}">Apply</a>
                </div>
                <br>

                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Bug Name</th>
                                <th>User</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $task->bug->name }}</td>
                                    <td>{{ $task->user->name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>
                                    @if($task->status == "PENDING")
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
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('admin.task.edit', $task->id) }}" role="button">
                                        <i class="bi bi-pencil"></i></a>
                                    
                                    <a name="" id="" class="btn btn-primary"
                                        href="{{ route('admin.task.show', $task->id) }}" role="button">
                                        <i class="bi bi-eye-fill"></i></a>

                                    <form onsubmit="return confirm('Delete this Program permanently?')" class="d-inline"
                                        action="{{ route('admin.task.destroy', [$task->id]) }}" method="POST">

                                        @csrf

                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="submit" value="Delete" class="btn btn-danger">
                                        
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </section>
@endsection