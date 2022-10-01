@extends('layouts.user')

@section("content")
    <div class="pagetitle">
        <h1>Bug</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Bug</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Bug</h4>
                <!-- garis horizontal
                <div class="container">

                    <div class="row g-3 text-center">
                        <div class="col-md-1">
                            <select class="form-select" id="validationDefault04" required>
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                            </select>
                        </div>

                    <div class="col-md-2"> <a>entries per page</a></div>
                        <div class="col-md-3">
                             <select class="form-select" id="validationDefault04" required>
                                <option>New</option>
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                            </div>
                       
                    <div class="col-md-3">
                    <form role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>

            <div class="col-md-2">
            <button type="button" class="btn btn-primary" name="" id=""
                                    href="#"> Show
                                        <i class="bi bi-eye-fill"></i></button>

            </div>
            
        </div>
        garis horizontal -->
    
        <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a> <div class="form-group mt-3 mb-lg-3">
                <select class="form-select" name="status" id="floatingSelect" aria-label="Floating label select example" value="{{ $task->status ?? '' }}">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>  
                <a> <div class="form-group mt-2 mb-lg-2">
                enteries per pages
                </div>
    </a>
        
        

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary"></a></li>

        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="status">
        <div class="form-group mt-3 mb-lg-3">
                <select class="form-select" name="status" id="floatingSelect" aria-label="Floating label select example" value="{{ $task->status ?? '' }}">
                        <option selected>New</option>
                        <option value="pending">PENDING</option>
                        <option value="waiting approved">WAITING APPROVED</option>
                        <option value="approved">APPROVED</option>
                        <option value="rejected">REJECTED</option>
                    </select>
                </div>
        </form>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-primary">Apply</button>
        </div>
      </div>
    </div>
  </header>
                <br>

                    <div class="container">
                    <table id="table table-borderless" class="table">
                
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Bug Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($bugs as $bug)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td scope="row">{{ $bug->name }}</td>
                                    <td scope="row">{{ $bug->description }}</td>
                                    <td scope="row"> 
                                         @if($bug->image)
                                        <img src="{{asset('storage/'.$bug->image)}}" width="70px" />
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td scope="row">
                                    @if($bug->status == "SOLVED")
                                    <span class="badge bg-success">{{$bug->status}}</span>
                                    @elseif($bug->status == "NO SOLVED")
                                    <span class="badge bg-danger text-light">{{$bug->status}}</span>
                                    @elseif($bug->status == "ON GOING")
                                    <span class="badge bg-primary text-light">{{$bug->status}}</span>
                                    @endif
                                    </td>
                                    <td scope="row">
                                        <a href="{{ route('user.bug.show', $bug->id) }}" name="" id="" role="button" class="btn btn-primary">Show
                                        <i class="bi bi-eye"></i></a>
                                        

                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
    </section>
@endsection