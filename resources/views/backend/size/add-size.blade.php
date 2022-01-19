@extends('backend.master');
@section('main-contant')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(isset($editdata))
            <h1>Update Size</h1>
            @else
            <h1>Manage Size</h1>
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
                 <h3>Add Size
                 <a class="btn btn-success float-right"href="{{route('size.view')}}"><i class="fa fa-plus-circle"></i>Size List</a>
                 </h3>
              </div>
              <div class="card-body">
                 <form action="{{(@$editdata)?route('size.update',$editdata->id):route('size.store')}}" method="POST" id="myfrom">
                    @csrf
                      <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="name">Size Name:</label>
                      <input type="text" class="form-control" id="name" value="{{@$editdata->name}}" placeholder="Enter Size name" name="name" required>
                        @if ($errors->has('name'))
                          <span class="text-danger">{{ $errors->first('name') }}</span>
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