@extends('backend.master');
@section('main-contant')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(isset($editdata))
            <h1>Update slider</h1>
            @else
            <h1>Manage slider</h1>
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
                 <h3>Add slider
                 <a class="btn btn-success float-right"href="{{route('slider.view')}}"><i class="fa fa-plus-circle"></i>slider List</a>
                 </h3>
              </div>
              <div class="card-body">
                 <form action="{{(@$editdata)?route('slider.update',$editdata->id):route('slider.store')}}" method="POST" id="myfrom" enctype="multipart/form-data">
                    @csrf
                      <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="image">Image:</label>
                            <input type="file"  name="image" id="image" class="form-control">
                            @if ($errors->has('image'))
                              <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                         </div>
                         <div class="form-group col-md-3">
                          <img  id="showImage" src="{{(!empty(@$editdata->image))?asset('/upload/slider_image/'.@$editdata->image):asset('/upload/no_image.png')}}"
                          style="width:250px; height:200px;">
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
          name: {
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