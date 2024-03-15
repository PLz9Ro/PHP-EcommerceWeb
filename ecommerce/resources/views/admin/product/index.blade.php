@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
    <div class="card">
        <div class="row container-fluid">
            <div class="card-header col-sm-6">
                <h1 class="card-title text-uppercase"> Product</h1>
            </div>
            <div style="text-align:right;" class="col-sm-6">
                <a href="{{ url('admin/product/create') }}" class="btn btn-info"> Create New Product</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            @include('_message')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Create Date</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ ($value->created_by == 1) ? 'Admin':'' }}</td>
                        <td>{{ ($value->status ==0 )?'Active':'Block' }}</td>
                        <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d-m-Y') }}</td>

                        <td>
                            <a href="{{ url('admin/product/edit/'.$value->id) }}" class="btn btn-outline-warning"> Edit</a>
                            <a href="{{ url('admin/product/delete/'.$value->id) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')"> Delete</a>


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