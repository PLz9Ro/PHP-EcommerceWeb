@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
    <div class="card">
        <div class="row container-fluid">
            <div class="card-header col-sm-6">
                <h1 class="card-title">Admin List</h1>
            </div>
            <div style="text-align:right;" class="col-sm-6">
                <a href="{{ url('admin/create') }}" class="btn btn-info"> Create New Admin</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            @include('_message')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th >ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($getRecord  as $value)
                    <tr>
                        <td>{{ $value->id  }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ ($value-> role == 1) ?'admin':'' }}</td>
                        <td>{{ ($value-> active == 0) ?'active':'block' }}</td>
                        <td>
                        <a href="{{ url('admin/edit/'.$value->id) }}" class="btn btn-outline-warning"> Edit</a>
                        <a href="{{ url('admin/delete/'.$value->id) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')"> Delete</a>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


</div>
@endsection

@section('script')

@endsection