@extends('template.hrmain')
@section('title', 'Dispproved Document')
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
                        <form class="needs-validation" novalidate
                            action="/document/{{ $document->document_id}}/disapproved_now" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="row">






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










                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="document_description">Document Remarks</label> required
                                            <textarea name="document_description" id="document_description"
                                                class="form-control @error('document_description') is-invalid @enderror"
                                                cols="10" rows="5"
                                                placeholder="Document Remarks">{{old('document_description', $document->document_description)}}</textarea>
                                            @error('document_description')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
                                    Reset</button>
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                                    Dispproved</button>
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