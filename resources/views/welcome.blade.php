@extends('master')
@section('kavi')
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="{{ asset('uploads/' . $latest_blog->image) }}"
                            alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $latest_blog->created_at }}</div>
                        <h2 class="card-title">{{ $latest_blog->title }}</h2>
                        <p class="card-text">{!! Str::words($latest_blog->description, 10, '...') !!}</p>
                        <a class="btn btn-primary" href="{{ route('detail', $latest_blog->id) }}">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($data as $d)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="{{ asset('uploads/' . $d->image) }}"
                                        width="700px" height="350px" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ $d->created_at }}</div>
                                    <h2 class="card-title h4">{{ $d->title }}</h2>
                                    <p class="card-text">{!! Str::words($d->description, 10, '...') !!}</p>
                                    <a class="btn btn-primary" href="{{ route('detail', $d->id) }}">Read more →</a>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                {{ $data->links() }}
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..."
                                aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories   ({{$categories->count()}})</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($categories as $c)
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="{{ route('view', $c->id) }}">{{ $c->title }}</a></li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
