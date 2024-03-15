@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">


  <div class="container-fluid">
    <div class="row">
      <div class="card-header">
        <h1 class="card-title">Edit Sub Category</h1>
      </div>
      <div style="text-align:right;" class="col-sm-12  pl-4">
        <a href="{{ url('admin/product') }}" class="btn btn-info">Back</a>
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
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="title">title<span style="color:red;">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('name', $product ->title) }}" id="title" required placeholder="Enter title">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="sku">SKU<span style="color:red;">*</span> </label>
                        <input type="sku" name="sku" class="form-control" value="{{old('sku', $product ->sku) }}" required id="sku" placeholder="Enter SkU">
                        <div style="color:red;">{{ $errors->first('slug') }}</div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="category">Category<span style="color:red;">*</span></label>
                        <select class="form-control" id="Category" name="Category">
                          <option value="" disabled>Select</option>
                          @foreach($getCategory as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="sub_category">Sub_category<span style="color:red;">*</span></label>
                        <select class="form-control" id="sub_category" name="sub_category">
                          <option value="">Chọn danh mục con</option>
                        </select>
                      </div>
                    </div>


                  </div>


                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="brand">Brand<span style="color:red;">*</span></label>
                        <select class="form-control" id="brand" name="brand">
                          <option value="">Chọn thương hiệu</option>
                        </select>
                      </div>
                      <div>
                        <label> Color</label>
                        <div>
                          <label><input type="checkbox" name="color_id[]">Red</label>
                        </div>
                        <div>
                          <label><input type="checkbox" name="color_id[]">White</label>
                        </div>
                        <div>
                          <label><input type="checkbox" name="color_id[]">Black</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="status">Status<span style="color:red;">*</span></label>
                        <select class="form-control" id="status" name="status" required>
                          <option {{ ($product ->status == 1 ) ? 'selected':'' }} value="1">Active</option>
                          <option {{ ($product ->status == 0 ) ? 'selected':'' }} value="0">Block</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="price">Price<span style="color:red;">*</span></label>
                        <input type="price" name="price" class="form-control" value="{{old('price', $product ->price) }}" required id="price" placeholder="Enter Price">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="old_price">Prev Price<span style="color:red;">*</span></label>
                        <input type="old_price" name="old_price" class="form-control" value="{{old('old_price', $product ->old_price) }}" required id="meta_description" placeholder="Enter Prev Price">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <label>Size<span style="color:red;">*</span></label>
                      <div>
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>#</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <input type="text" name="" class="form-control">
                              </td>
                              <td>
                                <input type="text" name="" class="form-control">
                              </td>
                              <td>
                                <input type="text" name="" class="form-control">
                              </td>
                              <td>
                                <button type="button" class="btn btn-outline-info">Add</button>
                                <button type="button" class="btn btn-outline-danger">Delete</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>


                  <div class="form-group">
                    <label for="short_description">Short Description<span style="color:red;">*</span></label>
                    <textarea placeholder="Enter Short Description" type="text" name="short_description" class="form-control"></textarea>
                  </div>


                  <div class="form-group">
                    <label for="description">Description<span style="color:red;">*</span></label>
                    <textarea placeholder="Enter Description" type="text" name="description" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="shippingreturns">ShippingReturns<span style="color:red;">*</span></label>
                    <input type="shippingreturns" name="shippingreturns" class="form-control" value="{{old('shippingreturns', $product ->shippingreturns) }}" required id="shippingreturns" placeholder="Enter meta_title">
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
<stript type='text/javascript'>
    
</script>
@endsection