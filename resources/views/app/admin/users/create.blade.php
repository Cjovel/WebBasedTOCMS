@extends('adminlte::page')

@section('title', 'Users -> Add new user')

@section('content_header')
    <h1>Users -> Add New User</h1>
@stop

@section('content')
    <div class='card'>
        <form method="post" action="{{route('app.admin.users.store')}}">
            @csrf
            @method('post')
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" placeholder="Enter email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="level">Type</label>
                        <select name="level" class="form-control @error('type') is-invalid @enderror" id="type" value="{{old('type')}}">
                            <option value="">--- please select ----</option>
                            <option value="0" {{old('type') == 0 ? "selected" : ""}}>Admin</option>
                            <option value="1" {{old('type') == 1 ? "selected" : ""}}>Teaching</option>
                            <option value="2" {{old('type') == 2 ? "selected" : ""}}>Non-Teaching</option>
                         </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Default Password</label>
                    <input type="text" name="password" class="form-control" value="P@ssw0rd" readonly>
                </div>
            </div>
            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('app.admin.users.index')}}" type="button" class="btn btn-default float-right">Cancel</a>
            </div>
        </form>
    </div>
@stop

@section('footer')
    Copyright &copy 2024. <a href='/admin'> Jovell's Blog</a>. All rights reserved.
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop