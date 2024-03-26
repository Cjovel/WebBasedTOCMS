@extends('adminlte::page')

@section('title', 'Employees | Create')

@section('content_header')
    <h1>Employees: New</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <form method="post" action="{{route('app.admin.employees.store')}}">
                    @csrf
                    @method('post')
                <div class="card-header">
                    <h3 class="card-title">New Employee</h3>
                    <div class="card-tools">
                        <a href="{{route('app.admin.employees.index')}}" class="btn btn-default btn-sm"><span class="fas fa-reply"></span> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="#">Lastname</label>
                        <input type="text" name="lastname" class="form-control" 
                            value="{{old('lastname')}}"
                            class="@error('lastname') is-invalid @enderror"
                            placeholder="Enter Lastname">
                         @error('lastname')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror   
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="#">Firstname</label>
                        <input type="text" name="firstname" class="form-control" 
                            value="{{old('firstname')}}"
                            class="@error('firstname') is-invalid @enderror"
                            placeholder="Enter Firstname">
                         @error('firstname')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror   
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender" value="{{old('gender')}}">
                            <option value="">--- please select ----</option>
                            <option>Male</option>
                            <option>Female</option>
                         </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="#">Birthdate</label>
                        <input type="date" name="birthdate" class="form-control" 
                            value="{{old('birthdate')}}"
                            class="@error('birthdate') is-invalid @enderror"
                            placeholder="Enter Birthdate">
                         @error('birthdate')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror   
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" class="form-control @error('type') is-invalid @enderror" id="type" value="{{old('type')}}">
                            <option value="">--- please select ----</option>
                            <option>Admin</option>
                            <option>Teaching</option>
                            <option>Non-Teaching</option>
                         </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="#">MembershipDate</label>
                        <input type="date" name="membershipdate" class="form-control" 
                            value="{{old('membershipdate')}}"
                            class="@error('membershipdate') is-invalid @enderror"
                            placeholder="Enter MembershipDate">
                         @error('membershipdate')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror   
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <button type="reset" class="btn btn-default"> Clear</button>
                    <button type="submit" class="btn btn-primary float-right"> Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <div style="text-align: center">
    Copyright &copy; 2024. <strong>WebBased TOCMS</strong>. All rights reserved.
    </div>  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>
@stop