@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">


  <div class="container-fluid">
    <div class="row">
      <div class="card-header">
        <h1 class="card-title">Create Category</h1>
      </div>
      <div style="text-align:right;" class="col-sm-12  pl-4">
        <a href="{{ url('admin/caterogy') }}" class="btn btn-info">Back</a>
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
                    <input type="name" name="name" class="form-control" value="{{ old('name') }} " id="name" placeholder="Enter Name">
                    <div style="color:red;">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group">
                    <label for="slug">Slug <span style="color:red;">*</span></label>
                    <input type="slug" name="slug" class="form-control" value="{{ old('slug') }}" id="slug" placeholder="Enter slug">
                    <div style="color:red;">{{ $errors->first('slug') }}</div>
 
                </div>

                  <div class="form-group">
                    <label for="status">Status <span style="color:red;">*</span></label>
                    <select class="form-control" id="status" name="status">
                      <option {{ (old('status') == 1 ) ? 'selected' : '' }} value="1">Active</option>
                      <option {{ (old('status') == 0 ) ? 'selected' : '' }} value="0">Block</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="meta_title">Meta Title </label>
                    <input type="meta_title" name="meta_title" class="form-control" value="{{ old('meta_title') }}" id="meta_title" placeholder="Enter Meta Title">
                  </div>
                  <div class="form-group">
                    <label for="meta_description">Meta Keys </label>
                    <input type="meta_description" name="meta_description" class="form-control" value="{{ old('meta_description') }}" id="meta_description" placeholder="Enter Meta Keys">
                  </div>
                  <div class="form-group">
                    <label for="meta_keys">Meta Keys </label>
                    <input type="meta_keys" name="meta_keys" class="form-control" value="{{ old('meta_keys') }}" id="meta_keys" placeholder="Enter Meta Keys">
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        alert("Form successful submitted!");
      }
    });
    $('#quickForm').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 5
        },
        terms: {
          required: true
        },
      },
      messages: {
        email: {
          required: "Please enter a email address",
          email: "Please enter a valid email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        terms: "Please accept our terms"
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>
@endsection