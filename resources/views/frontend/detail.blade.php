@extends('master')
@section('kavi')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{$data->title}}</h1>
                    <h6 class="fw-bolder mb-1">Total views={{$data->views}}</h6>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on {{$data->created_at}}</div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$data->category->title}}</a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="{{asset('uploads/'.$data->image)}}" alt="..." width="900px" height="400px"/></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4">{!!($data->description)!!}</p>
            </article>

        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
             {{-- <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div> --}}
            <!-- Categories widget-->

            <div class="card mb-4">
                <div class="card-header">Categories  ({{$categories->count()}})</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($categories as $c)
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="{{route('view',$c->id)}}">{{$c->title}}</a></li>
                                {{-- <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li> --}}
                            </ul>
                        </div>
                        @endforeach
                        {{-- <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            {{-- <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
