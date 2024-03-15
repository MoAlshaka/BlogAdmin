{{-- welcom .... <form action="{{ route('admin.logout') }}" method="post">
    @csrf

    <input type="submit" value="logout">
</form><br />
<a href="{{ route('category.index') }}">category</a> <br>
<a href="{{ route('posts.index') }}">posts</a> <br>
<a href="{{ route('comments.index') }}">comments</a> <br> --}}
@extends('layouts.master')

@section('title')
    Admin-Blog
@endsection
@section('css')
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Home</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"> Show</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
@endsection
@section('js')
@endsection
