@extends('template.hrmain')
@section('title', 'Documents')
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="/document/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add
                                    Document</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover text-center"
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        <th> Owner</th>
                                        <th style="width: 20%"> Document</th>
                                        <th> Status</th>

                                        <th>Action</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($document as $data)
                                    <tr>
                                        <td> {{ $data->document_owner}}</td>
                                        <td class="align-middle">{{ $data->document_type }}</td>
                                        <td class="align-middle">{{ $data->document_status}}</td>




                                        <td class="align-middle">


                                            <div class="d-flex justify-content-center">
                                                <a href="document/{{$data->document_id}}/approved"
                                                    class="btn btn-success btn-sm mr-1 same-size-btn">
                                                    <i class="fa-solid fa-thumbs-up"></i> Approved
                                                </a>




                                                <div class="d-flex justify-content-center">
                                                    <a href="document/{{$data->document_id}}/disapproved"
                                                        class="btn btn-danger btn-sm mr-1 same-size-btn">
                                                        <i class="fa-solid fa-thumbs-down"></i> Dispproved
                                                    </a>


                                        </td>

                                        <td class="align-middle">
                                            <div class="d-flex justify-content-center">
                                                <a href="document/{{$data->document_name}}/download"
                                                    class="btn btn-success btn-sm mr-1 same-size-btn">
                                                    <i class="fa-solid fa-download"></i> Download
                                                </a>


                                                <form class="d-inline"
                                                    action="{{ route('document.edit', ['document' => $data->document_id]) }}"
                                                    method="GET">
                                                    <button type="submit"
                                                        class="btn btn-success btn-sm mr-1 same-size-btn">
                                                        <i class="fa-solid fa-pen"></i> Edit
                                                    </button>
                                                </form>

                                                <form class="d-inline" action="/document/{{ $data->document_id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm same-size-btn btn-with-space"
                                                        id="btn-delete">
                                                        <i class="fa-solid fa-trash-can"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
</div>

@endsection