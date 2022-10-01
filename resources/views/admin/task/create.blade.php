@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Task</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Task</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Bug</h4>
            <a name="" id="" class="btn btn-warning mb-2" href="{{ route('admin.task.index') }}" role="button">
                Back
            </a>
            <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(@$task)
                    @method('PUT')
                @endif
                <div class="form-group mt-3">
                    <label for="">Nama Bug</label>
                    <select class="form-select"name="bug_id" id="" >
                    <option disabled value="">Pilih Bug</option>
                    @foreach ($bug as $login)
                    <option value=" {{ $login->id }}">{{ $login->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="">Programmer</label>
                    <select class="form-select"name="user_id" id="" >
                    <option disabled value="">Pilih Bug</option>
                    @foreach ($user as $pengguna)
                    <option value=" {{ $pengguna->id }}">{{ $pengguna->name }}</option>
                    @endforeach
                    </select>
                </div>


                <div class="form-group mt-3">
                  <label for="">Description</label>
                  <textarea class="form-control" name="description" id="" rows="3">{{ $task->description ?? '' }}</textarea>
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
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Tanggal Mulai</label>
                            <input type="date" name="start" class="form-control" placeholder="Tanggal Mulai" required="" value="{{ $task->start ?? '' }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Tanggal Selesai</label>
                            <input type="date" name="end" class="form-control" placeholder="Tanggal Selesai" required="" value="{{ $task->end ?? '' }}">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
            
        </div>
    </div>
</section>
@endsection