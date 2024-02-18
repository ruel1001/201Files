@extends('template.main')
@section('title', 'Faculty Edit Document')
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
                        <li class="breadcrumb-item"><a href="/faculty">Document</a></li>
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
                                <a href="/document" class="btn btn-warning btn-sm"><i
                                        class="fa-solid fa-arrow-rotate-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <form class="needs-validation" novalidate action="/document/{{ $document->document_id}}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
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
                                                        .document_type_name + '">' +
                                                        value.document_type_name +
                                                        '</option>');
                                                });

                                                // Get the value to display in the select
                                                var selectedValue =
                                                    '{{ old("document_status", $document->document_type) }}';
                                                // Set the selected option
                                                $('#document_type').val(selectedValue);
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(xhr.responseText);
                                            }
                                        });
                                    });
                                    </script>


                                    <div class="col-lg-6" hidden>
                                        <div class="form-group">
                                            <label for="document_status">Status</label>
                                            <select name="document_status"
                                                class="form-control @error('status') is-invalid @enderror" id="status"
                                                required>
                                                <option value="">Select Status</option>
                                                <option value="Pending"
                                                    {{ old('document_status', $document->document_status) =='Pending' ? 'selected' : '' }}>
                                                    Pending
                                                </option>
                                                <option value="Approved"
                                                    {{ old('document_status', $document->document_status)=='Approved' ? 'selected' : '' }}>
                                                    Approved</option>
                                            </select>
                                            @error('document_status')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>







                                    <!-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="document_description">Document Remarks</label>
                                            <textarea name="document_description" id="document_description"
                                                class="form-control @error('document_description') is-invalid @enderror"
                                                cols="10" rows="5"
                                                placeholder="Document Remarks">{{ old('document_description', $document->document_description) }}</textarea>
                                            @error('document_description')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                           -->
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
