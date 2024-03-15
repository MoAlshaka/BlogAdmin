{{-- @if (session('Delete'))
    {{ session('Delete') }}
@endif

@isset($comments)
    @foreach ($comments as $comment)
        {{ $comment->name }} .... {{ $comment->email }}
        ....{{ $comment->comment }} ....
        <form action="{{ route('comments.delete', $comment->id) }}" method="post">
            @csrf

            <input type="submit" value="delete">
        </form>
        <br>
    @endforeach
@endisset --}}

@extends('layouts.master')

@section('title')
    Comments
@endsection
@section('css')
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets1/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets1/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets1/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
@endsection
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Comments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Comments</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">All Comments </h2>

                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">

                        @if (session('Delete'))
                            {{ session('Delete') }}
                        @endif

                        @isset($comments)
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Comment</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td>{{ $comment->name }}</td>
                                            <td>{{ $comment->email }}</td>
                                            <td> {{ $comment->comment }}</td>
                                            <td>
                                                <form action="{{ route('comments.delete', $comment->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" type="button"
                                                        class="btn btn-danger btn-sm">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    @endisset
                </div>
                <!-- /.card -->

                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets1/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets1/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets1/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets1/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets1/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets1/dist/js/demo.js') }}"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
