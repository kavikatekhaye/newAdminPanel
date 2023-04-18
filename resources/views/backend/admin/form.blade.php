@extends('backend.layouts.master')

@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> My Profile</h1>

            <nav>
                {{-- <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">view</a></li>
          <li class="breadcrumb-item">backend</li>
          <li class="breadcrumb-item">blog</li>
          <li class="breadcrumb-item active">create</li>
        </ol> --}}
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-9">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <div class="card">
                        <div class="card-body">
                            {{-- <h5 class="card-title">Create Blog </h5> --}}

                            <!-- General Form Elements -->

                            <form action="{{ route('form.update',$user->id) }}"method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="" name="name"
                                        value="{{ $user->name }}" readonly> <br>
                                </div>
                                <!-- <div class="row mb-3">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control">
                      </div>
                    </div> -->
                                <div class="row mb-3">
                                    <label for="email">Email:</label>
                                    <input type class="form-control" name="email" id="email"
                                        cols="30"placeholder="" value="{{ $user->email }}" readonly> <br>
                                </div>
                                <!-- <div class="row mb-3">
                      <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control">
                      </div>
                    </div> -->



                                <div class="row mb-3">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter New Password"
                                        name="password"><br>
                                </div>
                                <div class="row mb-3">
                                    <label for="image">Profile:</label>
                                    <input type="file" class="form-control" id="image" placeholder=""
                                        name="image"><br>
                                </div>

                                {{-- <div class="row mb-3">
                <select name="category_id"id="cars">
                  @foreach ($data as $d)
                      <option value="{{$d->id}}">{{$d->title}}</option>
                      @endforeach
                   </select>
            </div> --}}

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update password</button>
                                    </div>
                                </div>


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
