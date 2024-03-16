@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">


  <div class="container-fluid">
    <div class="row">
      <div class="card-header">
        <h1 class="card-title">Edit Size</h1>
      </div>
      <div style="text-align:right;" class="col-sm-12  pl-4">
        <a href="{{ url('admin/size') }}" class="btn btn-info">Back</a>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name<span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $getRecord ->name) }}" id="name" required placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug' ,$getRecord ->slug) }}" id="slug" placeholder="Enter Color slug">
                  </div>
                  <div class="form-group">
                    <label for="status">Status <span style="color:red;">*</span></label>
                    <select class="form-control" id="status" name="status">
                      <option {{ (old('status') == 1 ) ? 'selected' : '' }} value="1">Active</option>
                      <option {{ (old('status') == 0 ) ? 'selected' : '' }} value="0">Block</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>

              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
</div>
@endsection

@section('script')

<!-- jquery-validation -->
<script src="{{url('admin-asset/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('admin-asset/plugins/jquery-validation/additional-methods.min.js')}}"></script>
</script>
@endsection