@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
    <div class="card">
        <div class="row container-fluid">
            <div class="card-header col-sm-6">
                <h1 class="card-title text-uppercase"> Sub Category</h1>
            </div>
            <div style="text-align:right;" class="col-sm-6">
                <a href="{{ url('admin/sub_category/create') }}" class="btn btn-info"> Create New Sub-Category</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            @include('_message')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>SubCategory Name</th>
                        <th>Category Name</th>
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
                        <td>{{ $value->category_name }}</td>
                        <td>{{ $value->slug  }}</td>
                        <td>{{ $value->meta_title  }}</td>
                        <td>{{ $value->meta_description  }}</td>
                        <td>{{ $value->meta_keys }}</td>
                        <td>{{ $value->created_by_name }}</td>
                        <td>{{ ($value->status == 1) ? 'Active':'Block' }}</td>
                        <td>{{ date('d-m-Y' ,strtotime($value->create_at)) }}</td>
                        <td>
                            <a href="{{ url('admin/sub_category/edit/'.$value->id) }}" class="btn btn-outline-warning"> Edit</a>
                            <a href="{{ url('admin/sub_category/delete/'.$value->id) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')"> Delete</a>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="padding: 10px; float: right;">
                {!! $getRecord->appends (Illuminate\Support\Facades\Request::except('page'))->
                links() !!}
            </div>
        </div>
        <!-- /.card-body -->
    </div>


</div>
@endsection

@section('script')

@endsection