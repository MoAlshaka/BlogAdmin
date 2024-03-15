{{-- <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $post->title }}">
    @error('title')
        {{ $message }}
    @enderror
    <input type="file" name="image">
    @error('image')
        {{ $message }}
    @enderror
    <textarea name="content" cols="30" rows="10">{{ $post->content }}</textarea>
    @error('content')
        {{ $message }}
    @enderror
    <select name="category_id">
        <option value="{{ $post->category->id }}">{{ $post->category->name }}</option>
        @isset($categories)
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        @endisset
    </select>
    <input type="text" name="tag" value="{{ $post->tag }}" list="tags">
    <datalist id="tags">
        @isset($tags)
            @foreach ($tags as $tag)
                <option value="{{ $tag }}">
                    {{ $tag }}
                </option>
            @endforeach
        @endisset
    </datalist>
    @error('tag')
        {{ $message }}
    @enderror
    <input type="submit" value="edit">
</form> --}}
@extends('layouts.master')

@section('title')
    Edit-Post
@endsection
@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets1/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets1/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('assets1/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('assets1/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets1/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets1/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets1/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('assets1/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
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
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Edit Post</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputTitle">Title</label>
                            <input type="text" class="form-control" id="exampleInputTitle" name="title"
                                value="{{ $post->title }}" placeholder="Enter Title">
                        </div>
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" name="content" rows="3" placeholder="Enter Content">{{ $post->content }}</textarea>
                        </div>
                        @error('content')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="customFile">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control select2" style="width: 100%;" name="category_id">
                                <option value="{{ $post->category->id }}">{{ $post->category->name }}</option>
                                @isset($categories)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Tags</label>
                            <select class="select2" multiple="multiple" data-placeholder="tags" style="width: 100%;">
                                @isset($tags)
                                    @foreach ($tags as $tag)
                                        @php
                                            $tags = explode(' ', $tag);
                                        @endphp
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag }}">
                                                {{ $tag }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tags</label>
                            <input type="text" name="tag" list="tags" value="{{ $post->tag }}">
                            <datalist id="tags">
                                @isset($tags)
                                    @foreach ($tags as $tag)
                                        @php
                                            $infos = explode(' ', $tag);
                                        @endphp
                                        @foreach ($infos as $info)
                                            <option value="{{ $info }}">
                                                {{ $info }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                @endisset
                            </datalist>
                        </div>
                        @error('tag')
                            {{ $message }}
                        @enderror

                    </div>
                    <!-- /.form-group -->

                    <!-- /.col -->
                </div>
                <button class="btn btn-primary btn-sm"> Edit </button>
            </div>
            <!-- /.row -->
        </form>
    </div>
    <!-- /.card-body -->
@endsection

@section('js')
    <!-- jQuery -->
    <script src="{{ asset('assets1/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets1/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets1/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('assets1/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('assets1/plugins/inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('assets1/plugins/moment/moment.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('assets1/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('assets1/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets1/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets1/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets1/dist/js/demo.js') }}"></script>
    <!-- Page script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });
        })
    </script>
@endsection
