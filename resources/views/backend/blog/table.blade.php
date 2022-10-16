@extends('backend.layouts.master')

@section('content')





<main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      @if (session()->has('msg'))
      <div class="alert alert-success">
         {{session()->get('msg')}}
      </div>

      @endif

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>

        </ol>
      </nav>


    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Table</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                   <th>Title</th>
                 <th>Description</th>
                    <th>IMAGE</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                  <tr>
                    <td>{{$d->id}}</td>
                    <td>{{$d->title}}</td>
                    <td>{!!$d->description!!}</td>
                    <td><img src="{{asset('uploads/'.$d->image)}}"width="50px"height="50px" alt=""></td>
                    <td><a href="{{route('admin.blog.edit',$d->id)}}"><button type="Edit" class="btn btn-success">edit</button></td>
                    <td><a href="{{route('admin.blog.delete',$d->id)}}"><button type="delete" class="btn btn-danger">delete</button></td>
                  </tr>

                  @endforeach
                </tbody>

              </table>
              {{$data->links()}}
              <!-- End Default Table Example -->
            </div>
          </div>


      </div>
    </section>

  </main>
