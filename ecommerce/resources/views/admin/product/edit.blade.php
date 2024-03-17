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
                        <select class="form-control" id="ChangeCategory" name="category_id">
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
                        <select class="form-control" id="GetSubCategory" name="sub_category_id">
                          <option value="">Select</option>
                        </select>
                      </div>
                    </div>


                  </div>


                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="brand_id">Brand<span style="color:red;">*</span></label>
                        <select class="form-control" id="brand_id" name="brand_id">
                          <option value="">Brand</option>
                          @foreach($getBrand as $brand)
                          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div>
                        <label> Color</label>
                        @foreach($getColor as $color)
                          @php
                            $checked = '';
                          @endphp
                          @foreach($product->getColor as $productcolor)
                            @if($productcolor->color_id == $color->id)
                              @php
                              $checked = 'checked';
                              @endphp
                            @endif
                          @endforeach
                        <div>
                          <label><input {{ $checked }} type="checkbox" name="color_id[]" value="{{ $color->id }}">{{ $color->name }}</label>
                        </div>
                        @endforeach
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
                          <tbody id="AppendSize">
                            <tr>
                              <td>
                                <select class="form-control" id="size" name="size['100']['name']">
                                  <option value="">Size</option>
                                  @foreach($getSize as $size)
                                  <option value="{{ $size->id }}">{{ $size->name }}</option>
                                  @endforeach
                                </select>
                              </td>
                              <td>
                                <input type="text" name="size['100']['price']" placeholder="Price" class="form-control">
                              </td>
                              <td>
                                <input type="text" name="size['100']['quatity']" placeholder="Quatity" class="form-control">
                              </td>
                              <td>
                                <button type="button" class="btn btn-outline-info AddSize">Add</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                  </div>


                  <div class="form-group">
                    <label for="short_description">Short Description<span style="color:red;">*</span></label>
                    <textarea placeholder="Enter Short Description"required  type="text"value="{{old('short_description', $product ->short_description) }}"  name="short_description" class="form-control"></textarea>
                  </div>


                  <div class="form-group">
                    <label for="description">Description<span style="color:red;">*</span></label>
                    <textarea placeholder="Enter Description" required type="text" value="{{old('description', $product ->description) }}" name="description" class="form-control editor"></textarea>
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

          <div class="col-md-6">

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jquery-validation -->
<!-- <script src="{{url('admin-asset/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('admin-asset/plugins/jquery-validation/additional-methods.min.js')}}"></script> -->

<script type="text/javascript">
  var i = 101;

  $('body').on('click', '.AddSize', function(e) {
    var html = '<tr id="DeleteSize' + i + '">\n\
                     <td>\n\
                        <select class="form-control" id="size' + i + '" name="size[' + i + '][name]">\n\
                            <option value="">Size</option>\n\
                            @foreach($getSize as $size)\n\
                            <option value="{{ $size->id }}">{{ $size->name }}</option>\n\
                            @endforeach\n\
                        </select>\n\
                    </td>\n\
                    <td>\n\
                        <input value="" type="text" placeholder="Price" name="size[' + i + '][price]" class="form-control">\n\
                    </td>\n\
                    <td>\n\
                        <input type="text" name="size[' + i + '][quatity]" placeholder="Quantity" class="form-control">\n\
                    </td>\n\
                    <td>\n\
                        <button type="button" class="btn btn-outline-info DeleteSize" data-id="' + i + '">Delete</button>\n\
                    </td>\n\
                </tr>';
    $('#AppendSize').append(html);
    i++;
  });
  $('body').on('click', '.DeleteSize', function(e) {
    var id = $(this).data('id');
    $('#DeleteSize' + id).remove();
  });

  $('body').on('change', '#ChangeCategory', function(e) {
    var id = $(this).val();
    $.ajax({
      type: "POST",
      url: "{{ url('admin/get_sub_cate') }}",
      data: {
        "id": id,
        "_token": "{{ csrf_token() }}"
      },
      dataType: "json",
      success: function(data) {
        $('#GetSubCategory').html(data.html);
      },
      error: function(data) {
        console.error(data);
      }
    });
  });
</script>
@endsection