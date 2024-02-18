@extends('template.hrmain')
@section('title', 'Add Document Type')
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
                                <a href="/faculty" class="btn btn-warning btn-sm"><i
                                        class="fa-solid fa-arrow-rotate-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <form class="needs-validation" novalidate action="/document_type" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="document_type_name">Document Type name</label>
                                            <textarea name="document_type_name" id="document_type_name"
                                                class="form-control @error('document_type_name') is-invalid @enderror"
                                                cols="10" rows="5"
                                                placeholder="Document Remarks">{{old('document_type_name')}}</textarea>
                                            @error('document_type_name')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="document_type_status">Document Type Status</label>
                                            <select name="document_type_status"
                                                class="form-control @error('document_type_status') is-invalid @enderror"
                                                id="document_type_status" required>
                                                <option value="">Select Status</option>
                                                <option value="                                                    Active
                                                " {{ old('document_type_status')=='Active' ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="Inactive"
                                                    {{ old('document_type_status')=='Inactive' ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                            @error('document_type_status')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>




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