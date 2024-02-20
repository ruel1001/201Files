@if(auth()->user()->user_type === 'hmo')
@extends('template.hrmain')
@endif

@if(auth()->user()->user_type === 'faculty')
@extends('template.main')
@endif
@section('title', 'Add Faculty')
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
                                <a href="/faculty" class="btn btn-warning btn-sm"><i
                                        class="fa-solid fa-arrow-rotate-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <form class="needs-validation" novalidate action="/faculty" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">First name</label>
                                            <input type="text" name="first_name"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="first_name" placeholder="First name" value="{{old('first_name')}}"
                                                required>
                                            @error('first_name')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Middle name</label>
                                            <input type="text" name="middle_name"
                                                class="form-control @error('middle_name') is-invalid @enderror"
                                                id="middle_name" placeholder="Middle name"
                                                value="{{old('middle_name')}}" required>
                                            @error('first_name')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Last name</label>
                                            <input type="text" name="last_name"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                id="last_name" placeholder="Last name" value="{{old('last_name')}}"
                                                required>
                                            @error('last_name')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Date Of Birth</label>
                                            <input type="date" name="date_of_birth"
                                                class="form-control @error('date_of_birth') is-invalid @enderror"
                                                id="date_of_birth" placeholder="Date of Birth"
                                                value="{{old('date_of_birth')}}" required>
                                            @error('date_of_birth')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Place of Birth</label>
                                            <input type="text" name="place_of_birth"
                                                class="form-control @error('place_of_birth') is-invalid @enderror"
                                                id="place_of_birth" placeholder="Place of Birth"
                                                value="{{old('place_of_birth')}}" required>
                                            @error('place_of_birth')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="sex">Gender</label>
                                            <select name="sex" class="form-control @error('sex') is-invalid @enderror"
                                                id="sex" required>
                                                <option value="">Select Gender</option>
                                                <option value="male" {{ old('sex')=='male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="female" {{ old('sex')=='female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                            @error('sex')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Citizenship</label>
                                            <input type="text" name="citizenship"
                                                class="form-control @error('citizenship') is-invalid @enderror"
                                                id="citizenship" placeholder="Citizenship"
                                                value="{{old('citizenship')}}" required>
                                            @error('citizenship')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">GSIS NO</label>
                                            <input type="number" name="gsis_id"
                                                class="form-control @error('gsis_id') is-invalid @enderror" id="gsis_id"
                                                placeholder="GSIS No" value="{{old('gsis_id')}}" required>
                                            @error('gsis_id')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">PAG-IBIG number</label>
                                            <input type="number" name="pag_ibig_id"
                                                class="form-control @error('pag_ibig_id') is-invalid @enderror"
                                                id="pag_ibig_id" placeholder="PAG-IBIG number"
                                                value="{{old('pag_ibig_id')}}" required>
                                            @error('pag_ibig_id')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">SSS No</label>
                                            <input type="number" name="sss_id"
                                                class="form-control @error('sss_id') is-invalid @enderror" id="sss_id"
                                                placeholder="SSS No" value="{{old('sss_id')}}" required>
                                            @error('sss_id')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Residence Address</label>
                                            <input type="text" name="resid_add"
                                                class="form-control @error('resid_add') is-invalid @enderror"
                                                id="resid_add" placeholder="Residence Address"
                                                value="{{old('resid_add')}}" required>
                                            @error('resid_add')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>




                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Mobile Number</label>
                                            <input type="tel" name="mobile_no"
                                                class="form-control @error('mobile_no') is-invalid @enderror"
                                                id="mobile_no" placeholder="Mobile number" value="{{old('mobile_no')}}"
                                                required>
                                            @error('mobile_no')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">TIN</label>
                                            <input type="number" name="tin"
                                                class="form-control @error('tin') is-invalid @enderror" id="tin"
                                                placeholder="TIN number" value="{{old('tin')}}" required>
                                            @error('tin')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="sex">Department</label>
                                            <select name="department"
                                                class="form-control @error('department') is-invalid @enderror"
                                                id="department" required>
                                                <option value="">Select Department</option>
                                                <option value="Automotive Technology" {{ old('department')=='Automotive Technology' ? 'selected'
                          : '' }}>Automotive Technology</option>
                                                <option value="Cosmetology"
                                                    {{ old('department')=='Cosmetology' ? 'Cosmetology' : '' }}>
                                                    Cosmetology</option>
                                                <option value="Drafting"
                                                    {{ old('department')=='Drafting' ? 'Drafting' : '' }}>Drafting
                                                </option>
                                                <option value="Electrical Technology" {{ old('department')=='Electrical Technology'
                          ? 'Electrical Technolog' : '' }}>Electrical Technology</option>
                                                <option value="Electronics Technology" {{ old('department')=='Electronics Technology'
                          ? 'Electronics Technology' : '' }}>Electronics Technology</option>
                                            </select>
                                            @error('department')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
 -->



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                            <select name="department" id="department"
                                                class="form-control @error('department') is-invalid @enderror" required>
                                                <option value="">Select Department</option>
                                            </select>
                                            @error('department')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>




                                    <script>
                                    $(document).ready(function() {
                                        // Make AJAX request to fetch document types
                                        $.ajax({
                                            url: '/departments',
                                            type: 'GET',
                                            dataType: 'json',
                                            success: function(data) {
                                                // Log the response
                                                console.log(data);

                                                // Populate select options with received data
                                                $.each(data, function(key, value) {
                                                    $('#department').append(
                                                        '<option value="' + value
                                                        .department_name +
                                                        '">' + value
                                                        .department_name +
                                                        '</option>');
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(xhr.responseText);
                                            }
                                        });
                                    });
                                    </script>



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                placeholder="Email" value="{{old('email')}}" required>
                                            @error('email')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="sex">Civil Status</label>
                                            <select name="civil_status"
                                                class="form-control @error('civil_status') is-invalid @enderror"
                                                id="civil_status" required>
                                                <option value="">Select Status</option>
                                                <option value="Single" {{ old('sex')=='Single' ? 'selected' : '' }}>
                                                    Single</option>
                                                <option value="Married" {{ old('sex')=='Married' ? 'Married' : '' }}>
                                                    Married</option>
                                                <option value="Divorced" {{ old('sex')=='Divorced' ? 'Divorced' : '' }}>
                                                    Divorced</option>
                                                <option value="Widowed" {{ old('sex')=='Widowed' ? 'Widowed' : '' }}>
                                                    Widowed</option>
                                                <option value="Separated"
                                                    {{ old('sex')=='Separated' ? 'Separated' : '' }}>Married</option>
                                            </select>
                                            @error('civil_status')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password"
                                                    class="form-control password-toggle @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Password" value="{{old('password')}}"
                                                    required>

                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status"
                                                class="form-control @error('status') is-invalid @enderror" id="status"
                                                required>
                                                <option value="">Select Status</option>
                                                <option value="Active" {{ old('status')=='Active' ? 'selected' : '' }}>
                                                    Active
                                                </option>
                                                <option value="Inactive"
                                                    {{ old('staus')=='Inactive' ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                            @error('status')
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