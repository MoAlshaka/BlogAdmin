{{-- <a href="{{ route('posts.index') }}">back </a>
<br>
@isset($post)
    {{ $post->title }} ....{{ $post->content }} ....{{ $post->category->name }} .... {{ $post->created_at }} ....
    <img src="{{ asset('posts/images/' . $post->image) }}"> <a href="{{ route('posts.edit', $post->id) }}">edit</a>
    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="delete">
    </form>
    <br>
@endisset --}}

@extends('layouts.master')

@section('title')
@endsection
@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets1/plugins/fontawesome-free/css/all.min.css ') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets1/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets1/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Blog Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    @isset($post)
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">{{ $post->title }}</h3>
                            <div class="col-12">
                                <img src="{{ asset('posts/images/' . $post->image) }}" class="product-image"
                                    alt="Product Image">
                            </div>
                            {{-- <div class="col-12 product-image-thumbs">
                                <div class="product-image-thumb active"><img src="{{ asset('assets1/dist/img/prod-1.jpg') }}"
                                        alt="Product Image"></div>
                                <div class="product-image-thumb"><img src="{{ asset('assets1/dist/img/prod-2.jpg') }}"
                                        alt="Product Image">
                                </div>
                                <div class="product-image-thumb"><img src="{{ asset('assets1/dist/img/prod-3.jpg') }}"
                                        alt="Product Image">
                                </div>
                                <div class="product-image-thumb"><img src="{{ asset('assets1/dist/img/prod-4.jpg') }}"
                                        alt="Product Image">
                                </div>
                                <div class="product-image-thumb"><img src="{{ asset('assets1/dist/img/prod-5.jpg') }}"
                                        alt="Product Image">
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{ $post->title }}</h3>
                            <p>{{ $post->content }}</p>





                        </div>
                    @endisset
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection

@section('js')
    <!-- jQuery -->
    <script src="{{ asset('assets1/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets1/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets1/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets1/dist/js/demo.js') }}"></script>
@endsection
