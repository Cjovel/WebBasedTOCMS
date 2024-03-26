@extends('adminlte::page')

@section('title', 'Fees | Modify')

@section('content_header')
    <h1>Fees: Modify</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <form method="post" action="{{route('app.admin.fees.update', $fee)}}">
                    @csrf
                    @method('put')
                <div class="card-header">
                    <h3 class="card-title">Modify Fees</h3>
                    <div class="card-tools">
                        <a href="{{route('app.admin.fees.index')}}" class="btn btn-default btn-sm"><span class="fas fa-reply"></span> Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="#">ID</label>
                        <input type="text" name="id" class="form-control" 
                            value="{{$fee->id}}"
                            class="@error('id') is-invalid @enderror"
                            placeholder="" readonly>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                        <label for="#">Shortname</label>
                        <input type="text" name="shortname" class="form-control" 
                            value="{{old('shortname')}}"
                            class="@error('shortname') is-invalid @enderror"
                            placeholder="Enter Shortname">
                         @error('shortname')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror   
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="#">Description</label>
                        <input type="text" name="description" class="form-control" 
                            value="{{old('description')}}"
                            class="@error('description') is-invalid @enderror"
                            placeholder="Enter Description">
                         @error('description')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror   
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="#">AmountDue</label>
                        <input type="text" name="amountdue" class="form-control" 
                            value="{{old('amountdue')}}"
                            class="@error('amountdue') is-invalid @enderror"
                            placeholder="Enter AmountDue">
                         @error('amountdue')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror   
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="form-group">
                        <label for="#">AmountBalance</label>
                        <input type="text" name="amountbalance" class="form-control" 
                            value="{{old('amountbalance')}}"
                            class="@error('amountbalance') is-invalid @enderror"
                            placeholder="Enter AmountBalance">
                         @error('amountbalance')
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