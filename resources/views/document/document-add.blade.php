@if(auth()->user()->user_type === 'hmo')
@extends('template.hrmain')
@endif

@if(auth()->user()->user_type === 'faculty')
@extends('template.main')
@endif
@section('title', 'Add Document')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/faculty">Faculty</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="/document/{{ auth()->user()->email }}/mydocument"
                                    class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <form class="needs-validation" novalidate action="/document" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class=" card-body">
                                <div class="row">


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Document File</label>
                                            <input type="file" name="document_name" style="padding: 3px;"
                                                class="form-control @error('document_name') is-invalid @enderror"
                                                id="document_name" placeholder="Docoument File"
                                                value="{{old('document_name')}}" required>
                                            @error('document_name')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="document_type">Document Type name</label>
                                            <select name="document_type" id="document_type"
                                                class="form-control @error('document_type') is-invalid @enderror"
                                                required>
                                                <option value="">Select Document Type</option>
                                            </select>
                                            @error('document_type')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>




                                    <script>
                                    $(document).ready(function() {
                                        // Make AJAX request to fetch document types
                                        $.ajax({
                                            url: '/document-types',
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function(data) {
                                                // Log the response
                                                console.log(data);

                                                // Populate select options with received data
                                                $.each(data, function(key, value) {
                                                    $('#document_type').append(
                                                        '<option value="' + value
                                                        .document_type_name +
                                                        '">' + value
                                                        .document_type_name +
                                                        '</option>');
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(xhr.responseText);
                                            }
                                        });
                                    });
                                    </script>
















                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
                                    Reset</button>
                                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                                    Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
</div>

@endsection