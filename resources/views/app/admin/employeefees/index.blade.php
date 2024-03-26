@extends('adminlte::page')

@section('title', 'EmployeeFees')

@section('content_header')
    <h1>EmployeeFees</h1>
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
                <a href="" class="btn btn-primary btn-sm">New EmployeeFees</a>
            </div>
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10%">Id</th>
                        <th>Id_Deped</th>
                        <th>Fee_Id</th>
                        <th>Receipt_Id</th>
                        <th>Status</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employeefees as $employeefee)
                    <tr>
                        <td>{{$employeefee->id}}</td>
                        <td>{{$employeefee->foreign('Id_Deped')->references('id')->on('employees')}}</td>
                        <td>{{$employeefee->foreign('Fee_Id')->references('id')->on('fees')}}</td>
                        <td>{{$employeefee->foreign('Receipt_Id')->references('id')->on('receipts')}}</td>
                        <td>{{$employeefee->Status}}</td>
                        <td>
                            <form method="post" action=""> 
                                <a href="" class="btn btn-warning btn-sm">Modify <span class="fas fa-edit"></span></a>
                           
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