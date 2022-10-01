@extends('layouts.admin')

@section('content')
<div class="pagetitle">
    <h1>Bug</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Bug</li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" name="" id="" href="{{ route('admin.bug.index') }}">Back</a></div>
    </nav>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Form Bug</h4>
            <form action="{{ route('admin.bug.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(@$bug)
                    @method('PUT')
                @endif
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="name" id="" required aria-describedby="helpId" placeholder="Bug Name" value="{{ $bug->name ?? '' }}">
                    {{-- if error validate --}}
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" name="description" id="" rows="3" placeholder="Description">{{ $bug->description ?? '' }}</textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="image" name="image" value="{{ $bug->image ?? '' }}">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="status" aria-label="Default select example" value="{{ $bug->status ?? '' }}">
                      <option selected></option>
                      <option value="solved">SOLVED</option>
                      <option value="on going">ON GOING</option>
                      <option value="no solved">NO SOLVED</option>>
                    </select>
                  </div>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
                
            </form>
            
        </div>
    </div>
</section>
@endsection