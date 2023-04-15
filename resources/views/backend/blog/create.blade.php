@extends('backend.layouts.master')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Blog Elements</h1>
      @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">view</a></li>
          <li class="breadcrumb-item">backend</li>
          <li class="breadcrumb-item">blog</li>
          <li class="breadcrumb-item active">create</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create Blog </h5>

              <!-- General Form Elements -->

                <form action="{{url('admin/blog/store')}}"method="POST"enctype="multipart/form-data">
                    @csrf

                <div class="row mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{old('title')}}"> <br>
                </div>
                <!-- <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control">
                  </div>
                </div> -->
                <div class="row mb-3">
                    <label for="description">Description:</label>
                    <textarea class="form-control" name="description" id="description" cols="30"placeholder="Write something.." value="{{old('description')}}">{!!old('description')!!}</textarea> <br>
                </div><!-- <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control">
                  </div>
                </div> -->



                <div class="row mb-3">
                  <label for="image">image:</label>
                  <input type="file" class="form-control" id="image" placeholder="image" name="image"><br>
              </div>

              <div class="row mb-3">
                <select name="category_id"id="cars">
                  @foreach($data as $d)
                      <option value="{{$d->id}}">{{$d->title}}</option>
                      @endforeach
                   </select>
            </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

                <script>
                    ClassicEditor
                        .create( document.querySelector( '#description' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>


              </form>

            </div>
          </div>

        </div>

        <div class="col-lg-6">





            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @endsection
