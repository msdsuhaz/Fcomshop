@extends('backend.master');
@section('main-contant')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(isset($editdata))
            <h1>Update Product</h1>
            @else
            <h1>Manage Product</h1>
            @endif
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Fixed Footer Layout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                 <h3>Add Prodcut
                 <a class="btn btn-success float-right"href="{{route('products.view')}}"><i class="fa fa-plus-circle"></i>Product List</a>
                 </h3>
              </div>
              <div class="card-body">
                 <form action="{{(@$editdata)?route('products.update',$editdata->id):route('products.store')}}" method="POST" id="myfrom" enctype="multipart/form-data">
                    @csrf
                      <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Category</label>
                                <select name="category_id" id="category_id" class="form-control" select2>
                                    <option value="">Select Category</option>
                                    @foreach($categoryData as $category)
                                      <option value="{{$category->id}}" {{(@$editdata->category_id==$category->id)?"selected":""}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                  <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label>Brand</label>
                                <select name="brand_id" class="form-control">
                                    <option value="">Select Brand</option>
                                    @foreach($BrandData as $brand)
                                      <option value="{{$brand->id}}"{{(@$editdata->brand_id==$brand->id)?"selected":""}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('brand_id'))
                                <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Product Name:</label>
                              <input type="text" class="form-control" id="name" value="{{@$editdata->name}}" placeholder="Enter product name" name="name" required>
                                @if ($errors->has('name'))
                                  <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                           </div>
                           <div class="form-group col-md-6">
                                <label>Color</label>
                                <select name="color_id[]"  class="form-control select2" multiple>
                                    @foreach($ColorData as $Colors)
                                    <option value="{{$Colors->id}}" {{(@array(['color_id'=>$Colors->id],$color_array))?"selected":""}}>{{$Colors->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('color_id'))
                                <span class="text-danger">{{ $errors->first('color_id') }}</span>
                                @endif
                          </div>
                          <div class="form-group col-md-6">
                            <label>Size</label>
                            <select name="size_id[]" multiple class="form-control select2" >
                                @foreach($SizeData as $Sizes)
                                <option value="{{$Sizes->id}}"{{(@array(['size_id'=>$Sizes->id],$size_array))?"selected":""}}>{{ $Sizes->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('size_id'))
                            <span class="text-danger">{{ $errors->first('size_id') }}</span>
                            @endif
                          </div>
                          <div class="form-group col-md-12">
                            <label >short Description:</label>
                          <textarea name="sort_desc" id ="sort_desc" class="form-control">{{@$editdata->sort_desc}}</textarea>
                            @if ($errors->has('sort_desc'))
                              <span class="text-danger">{{ $errors->first('sort_desc') }}</span>
                            @endif
                         </div>
                         <div class="form-group col-md-12">
                            <label >Long Description:</label>
                            <textarea name="long_desc" class="form-control" rows="4">{{@$editdata->long_desc}}</textarea>
                            @if ($errors->has('long_desc'))
                              <span class="text-danger">{{ $errors->first('long_desc') }}</span>
                            @endif
                         </div>
                         <div class="form-group col-md-3">
                            <label for="price">price:</label>
                            <input type="number"  name="price" value="{{@$editdata->price}}" class="form-control">
                            @if ($errors->has('price'))
                              <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                         </div>
                         <div class="form-group col-md-3">
                            <label for="image">Image:</label>
                            <input type="file"  name="image" id="image" class="form-control">
                            @if ($errors->has('image'))
                              <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                         </div>
                         <div class="form-group col-md-3">
                          <img  id="showImage" src="{{(!empty($editdata->image))?asset('/upload/product_image/'.$editdata->image):asset('/upload/no_image.png')}}"
                          style="width:250px; height:200px;">
                         </div>
                        <div class="form-group col-md-3">
                          <label for="image">Sub Image:</label>
                          <input type="file"  name="sub_image[]"  class="form-control" multiple>
                          @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                          @endif
                       </div>
                     </div>
                <button type="submit" class="btn btn-success">{{(@$editdata)?"Update":"Submit"}}</button>
                  </form>
                </div>
                <!-- /.card-body -->
              </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
            
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#myfrom').validate({
        rules: {
          category_id: {
            required: true,
          },
          sort_desc: {
            required: true,
          },
          name: {
            required: true,
          },
          long_desc: {
            required: true,
          },
         
        messages: {
         
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
  <!-- /.content-wrapper -->
    
@endsection