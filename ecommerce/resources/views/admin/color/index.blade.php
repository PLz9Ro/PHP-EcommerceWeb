@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
    <div class="card">
        <div class="row container-fluid">
            <div class="card-header col-sm-6">
                <h1 class="card-title text-uppercase">Brand</h1>
            </div>
            <div style="text-align:right;" class="col-sm-6">
                <a href="{{ url('admin/color/create') }}" class="btn btn-info"> Create New Brand</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            @include('_message')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Create By</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($getRecord as $value)
                    <tr>
                        <td>{{ $value->id  }}</td>
                        <td>{{ $value->name  }}</td>
                        <td>{{ $value->code  }}</td>
                        <td>{{ $value->created_by_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ url('admin/color/edit/'.$value->id) }}" class="btn btn-outline-warning"> Edit</a>
                            <a href="{{ url('admin/color/delete/'.$value->id) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')"> Delete</a>


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