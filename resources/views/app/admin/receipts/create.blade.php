@extends('adminlte::page')

@section('title', 'Receipts | Create')

@section('content_header')
    <h1>Receipts: New</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <form method="post" action="{{route('app.admin.receipts.store')}}">
                    @csrf
                    @method('post')
                <div class="card-header">
                    <h3 class="card-title">New Receipt</h3>
                    <div class="card-tools">
                        <a href="{{route('app.admin.receipts.index')}}" class="btn btn-default btn-sm"><span class="fas fa-reply"></span> Back</a>
                    </div>
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
                        <label for="#">Amount Due</label>
                        <input type="number" name="amountdue" class="form-control" 
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
                        <label for="#">Amount Paid</label>
                        <input type="number" name="amountpaid" class="form-control" 
                            value="{{old('amountpaid')}}"
                            class="@error('amountpaid') is-invalid @enderror"
                            placeholder="Enter Amount Paid">
                         @error('amountpaid')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror   
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="#">Change</label>
                        <input type="number" name="change" class="form-control" 
                            value="{{old('change')}}"
                            class="@error('change') is-invalid @enderror"
                            placeholder="Enter Change">
                         @error('change')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror   
                    </div>
                </div>
        
                <div class="card-footer clearfix">
                    <button type="reset" class="btn btn-default"> Clear</button>
                    <button type="submit" class="btn btn-primary float-right"> Submit</button>
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