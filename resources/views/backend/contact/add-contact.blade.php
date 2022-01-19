@extends('backend.master');
@section('main-contant')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(isset($editdata))
            <h1>Update Category</h1>
            @else
            <h1>Manage Category</h1>
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
                 <h3>Add Contact
                 <a class="btn btn-success float-right"href="{{route('contact.view')}}"><i class="fa fa-plus-circle"></i>Contact List</a>
                 </h3>
              </div>
              <div class="card-body">
                 <form action="{{(@$editdata)?route('contact.update',$editdata->id):route('contact.store')}}" method="POST" id="myfrom">
                    @csrf
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Address:</label>
                            <textarea type="text" class="form-control" id="address" name="address">{{@$editdata->address}}</textarea>
                                @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                          </div>
                       <div class="form-group col-md-4">
                        <label>phone:</label>
                         <input type="text" class="form-control" id="mobile" value="{{@$editdata->mobile}}" placeholder="Enter Phone Number" name="mobile" required>
                            @if ($errors->has('mobile'))
                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            @endif
                      </div>
                      <div class="form-group col-md-4">
                        <label>Email:</label>
                         <input type="text" class="form-control" id="email" value="{{@$editdata->email}}" placeholder="Enter Email" name="email" required>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                      </div>
                      <div class="form-group col-md-4">
                        <label>Facebook:</label>
                         <input type="text" class="form-control" id="facebook" value="{{@$editdata->facebook}}" placeholder="Enter Facebook Account id" name="facebook" required>
                            @if ($errors->has('facebook'))
                            <span class="text-danger">{{ $errors->first('facebook') }}</span>
                            @endif
                      </div>
                      <div class="form-group col-md-4">
                        <label>Twitter:</label>
                         <input type="text" class="form-control" id="twitter" value="{{@$editdata->twitter}}" placeholder="Enter twitter Account id" name="twitter" required>
                            @if ($errors->has('twitter'))
                            <span class="text-danger">{{ $errors->first('twitter') }}</span>
                            @endif
                      </div>
                      <div class="form-group col-md-4">
                        <label>Youtube:</label>
                         <input type="text" class="form-control" id="youtube" value="{{@$editdata->youtube}}" placeholder="Enter youtube Account id" name="youtube" required>
                            @if ($errors->has('youtube'))
                            <span class="text-danger">{{ $errors->first('youtube') }}</span>
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
          address: {
            required: true,
          },
          mobile: {
            required: true,
          },
          email: {
            required: true,
          },
          facebook: {
            required: true,
          },
          twitter: {
            required: true,
          },
          youtube: {
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