@extends('backend.master');
@section('main-contant')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(isset($editdata))
            <h1>Update Logo</h1>
            @else
            <h1>Manage Logo</h1>
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
                 <h3>Add Color
                 <a class="btn btn-success float-right"href="{{route('logo.view')}}"><i class="fa fa-plus-circle"></i>logo List</a>
                 </h3>
              </div>
              <div class="card-body">
                 <form action="{{(@$editdata)?route('logo.update',$editdata->id):route('logo.store')}}" method="POST" enctype="multipart/form-data" id="myfrom">
                    @csrf
                      <div class="form-row">
                      <div class="form-group col-md-4">
                            <label for="image">Logo:</label>
                            <input type="file" class="form-control" id="image" placeholder="Enter image" name="image" required/>
                      </div>
                      <div class="form-group col-md-4">
                        <img  id="showImage" src="{{(!empty(@$editdata->image))?asset('/upload/logo_image/'.@$editdata->image):asset('/upload/no_image.png')}}">
                        </div>
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