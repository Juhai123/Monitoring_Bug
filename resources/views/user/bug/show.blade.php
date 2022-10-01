@extends('layouts.user')

@section('content')
<div class="pagetitle">
        <h1>Bug</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Task</li>
            </ol>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" name="" id="" href="{{ route('user.bug.index') }}">Back</a></div>
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
                                    <h3><p class="text-primary">{{ $bug->name }} </p></h3>
                                </tr>
                                <tr>
                                @if($bug->status == "SOLVED")
                                    <span class="badge bg-success">{{$bug->status}}</span>
                                    @elseif($bug->status == "NO SOLVED")
                                    <span class="badge bg-danger text-light">{{$bug->status}}</span>
                                    @elseif($bug->status == "ON GOING")
                                    <span class="badge bg-primary text-light">{{$bug->status}}</span>
                                    @endif
                                  </tr>
                                  <br><br>
                                  <tr>
                                    @if($bug->image)
                                    <img src="{{asset('storage/' . $bug->image)}}" width="300px"> {{ $bug->description }}
                                   
                                    @endif
                                    
                                  </tr>
                                      
                            </tbody>
                          </table>
                    </div>
                </div>
                </div>
            </div>
          </section>

          <section>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body mt-2">
                        <h3>Add Comment</h3>
                        <form method="post" action="{{ route('user.comment.add') }}">
                            @csrf
                            <div>
                                <input type="text" class="form-control" name="comment_body">
                                <input type="hidden" name="bug_id" value="{{ $bug->id }}">
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary mt-2" value="Add Comment">
                            </div>
                        </form>
                        <br>
                        <h3>Comment</h3>
                        @foreach ($comments as $comment)
                            <strong>{{ $comment->users->name }} -
                                {{ $comment->created_at->diffForHumans() }}
                                <a class="btn btn-primary m-lg-3" data-bs-toggle="collapse"
                                    href="#collapseExample-{{ $comment->id }}" role="button" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    Comment Reply
                                </a></strong>
                            <p>{{ $comment->message }}</p>
                            <form method="post" action="{{ route('user.reply.add') }}">
                                @csrf
                                <div>
                                    <input type="text" class="form-control form-control-sm" name="comment_body">
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                </div>
                                <div>
                                    <input type="submit" class="btn btn-warning mt-2" value="Reply" />
                                </div>
                            </form>
                            <br>
                            @foreach ($comment->comments as $reply)
                                <div class="collapse" id="collapseExample-{{ $comment->id }}">
                                    <div class="card card-body">
                                        <strong class="text-muted">{{ $reply->users->name }} -
                                            {{ $reply->created_at->diffForHumans() }}</strong>
                                        <p class="text-muted"> {{ $reply->message }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body mt-2">
                        <img src="{{ asset('nice') }}/assets/img/logo.png" alt="" align="left"
                            style="width: 40px; height: 40px; border-radius: 50%;">
                        &nbsp;&nbsp;{{$task}}
                        &nbsp;&nbsp;<span class="badge bg-danger text-light">UNSOLVED</span><br>
                        &nbsp;&nbsp;<th>Web Desaigner</th>
                        <br><br>
                        <img src="{{ asset('nice') }}/assets/img/logo.png" alt="" align="left"
                            style="width: 40px; height: 40px; border-radius: 50%;">
                        &nbsp;&nbsp;Jack
                        &nbsp;&nbsp;<span class="badge bg-success text-light">SOLVED</span><br>
                        &nbsp;&nbsp;<th>Web Desaigner</th>
                        <br><br>
                        <img src="{{ asset('nice') }}/assets/img/logo.png" alt="" align="left"
                            style="width: 40px; height: 40px; border-radius: 50%;">
                        &nbsp;&nbsp;Jack
                        &nbsp;&nbsp;<span class="badge bg-primary text-light">ONGOING</span><br>
                        &nbsp;&nbsp;<th>Web Desaigner</th>
                        <br><br>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection