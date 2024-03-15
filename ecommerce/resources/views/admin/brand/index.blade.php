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
                <a href="{{ url('admin/brand/create') }}" class="btn btn-info"> Create New Brand</a>
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
                        <th>Slug</th>
                        <th>Meta Title</th>
                        <th>Meta Description</th>
                        <th>Meta Keys</th>
                        <th>Create By</th>
                        <th>Status</th>
                        <th>Create Day</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                        <td>{{ $value->id  }}</td>
                        <td>{{ $value->name  }}</td>
                        <td>{{ $value->slug  }}</td>
                        <td>{{ $value->meta_title  }}</td>   
                        <td>{{ $value->meta_description  }}</td>
                        <td>{{ $value->meta_keys }}</td>
                        <td>{{ $value->created_by_name }}</td>
                        <td>{{ ($value->status == 1) ? 'Active':'Block' }}</td>
                        <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d-m-Y') }}</td>
                        <td>
                        <a href="{{ url('admin/brand/edit/'.$value->id) }}" class="btn btn-outline-warning"> Edit</a>
                        <a href="{{ url('admin/brand/delete/'.$value->id) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')"> Delete</a>


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