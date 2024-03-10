@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">


  <div class="container-fluid">
    <div class="row">
      <div class="card-header">
        <h1 class="card-title">Edit Category</h1>
      </div>
      <div style="text-align:right;" class="col-sm-12  pl-4">
        <a href="{{ url('admin/category') }}" class="btn btn-info">Back</a>
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
                    <label for="slug">Slug<span style="color:red;">*</span> </label>
                    <input type="slug" name="slug" class="form-control" value="{{old('slug', $getRecord ->slug) }}" required id="slug" placeholder="Enter slug">
                    <div style="color:red;">{{ $errors->first('slug') }}</div>

                  </div>
                  <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="meta_title" name="meta_title" class="form-control"  value="{{old('meta_title', $getRecord ->meta_title) }}"required id="meta_title" placeholder="Enter meta_title">
                  </div>
                  <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <input type="meta_description" name="meta_description" class="form-control"  value="{{old('meta_description', $getRecord ->meta_description) }}"required id="meta_description" placeholder="Enter meta_title">
                  </div>
                  <div class="form-group">
                    <label for="meta_keys">Meta KeyWords</label>
                    <input type="meta_keys" name="meta_keys" class="form-control"  value="{{old('meta_keys', $getRecord ->meta_keys) }}"required id="meta_keys" placeholder="Enter meta_title">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                      <option {{ ($getRecord ->status == 1 ) ? 'selected':'' }} value="1">Active</option>
                      <option {{ ($getRecord ->status == 0 ) ? 'selected':'' }} value="0">Block</option>
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