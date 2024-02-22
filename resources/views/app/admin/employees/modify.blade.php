@extends('adminlte::page')

@section('title', 'Employees | Modify')

@section('content_header')
    <h1>Employees: Modify</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <form method="post" action="{{route('app.admin.employees.update', $employee)}}">
                    @csrf
                    @method('put')
                <div class="card-header">
                    <h3 class="card-title">Modify Employee</h3>
                    <div class="card-tools">
                        <a href="{{route('app.admin.employees.index')}}" class="btn btn-default btn-sm"><span class="fas fa-reply"></span> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="#">ID</label>
                        <input type="text" name="id" class="form-control" 
                            value="{{$employee->id}}"
                            class="@error('id') is-invalid @enderror"
                            placeholder="" readonly>
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
                            <option value="1" {{old('gender') == 1 ? "selected" : ""}}>Male</option>
                            <option value="2" {{old('gender') == 2 ? "selected" : ""}}>Female</option>
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
                        <input type="text" name="name" class="form-control" 
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
                            <option value="1" {{old('type') == 1 ? "selected" : ""}}>Admin</option>
                            <option value="2" {{old('type') == 2 ? "selected" : ""}}>Teaching</option>
                            <option value="3" {{old('type') == 3 ? "selected" : ""}}>Non-Teaching</option>
                         </select>
                        @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="#">MembershipDate</label>
                        <input type="text" name="membershipdate" class="form-control" 
                            value="{{old('membershipdate')}}"
                            class="@error('membershipdate') is-invalid @enderror"
                            placeholder="Enter MembershipDate">
                         @error('birthdate')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror   
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <button type="reset" class="btn btn-default"> Clear</button>
                    <button type="submit" class="btn btn-primary float-right"> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('footer')
    Copyright &copy; 2024. <strong>CBRJ Admin</strong>. All rights reserved.
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