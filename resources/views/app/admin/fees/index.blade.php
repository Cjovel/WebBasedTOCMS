@extends('adminlte::page')

@section('title', 'Fees')

@section('content_header')
    <h1>Fees</h1>
@stop

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible auto-close">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List</h3>
            <div class="card-tools">
                <a href="{{route('app.admin.fees.create')}}" class="btn btn-primary btn-sm">New Fees</a>
            </div>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10%">Id</th>
                        <th>Shortname</th>
                        <th>Description</th>
                        <th>AmountDue</th>
                        <th>AmountBalance</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fees as $fee)
                    <tr>
                        <td>{{$fee->id}}</td>
                        <td>{{$fee->Shortname}}</td>
                        <td>{{$fee->Description}}</td>
                        <td>{{$fee->AmountDue}}</td>
                        <td>{{$fee->AmountBalance}}</td>
                        <td>
                            <form method="post" action="{{route('app.admin.fees.destroy', $fee)}}"> 
                                <a href="{{route('app.admin.fees.modify', $fee)}}" class="btn btn-warning btn-sm">Modify <span class="fas fa-edit"></span></a>
                           
                                @csrf 
                                @method('delete')
                            <button type="submit" onclick="return confirm('This will delete the entry!\nAre you sure?')" class="btn btn-danger btn-sm">Delete <span class="fas fa-trash"></span></a>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
               
            </table>
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
            "responsive": true, "lengthChange": false, "autoWidth": false, "pageLength": 5,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example1').DataTable({
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