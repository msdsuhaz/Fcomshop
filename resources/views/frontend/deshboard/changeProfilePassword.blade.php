@extends('frontend.master')

@section('main-contant')

<style type="text/css">
  .prof li{
      background: #1781bf;
      padding: 7px;
      margin: 10px;
      border-radius: 15px;

  }

  .prof li:hover{
      background: #cff3ae;
  }

  
  .prof li a{
      color: white;
      padding-left: 1px;
  }
  .prof li a:hover{
      color: rgb(15, 15, 15);
  }

</style>
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"  style="background-image:url({{asset('/upload/bg_image/funituretwo.png')}});">
            <h2 class="1text-105 c10 text-center">
                      Customer Deshboard
            </h2>
    </section>
    @if(session('message'))
	 <div class="alert alert-success" role="alert" width="400px">
	   {{Session::get('message')}}
	 </div>
     @endif
    <div class="continer">
        <div class="row" style="padding: 15px 0px 15px 0px;">
            <div class="col-md-2" >
                <ul class="prof">
                    <li><a href="{{route('deshbord')}}">MY PROFILE</a></li>
                    <li><a href="{{route('change.customer.password')}}">PASSWORD CHANGE</a></li>
                    <li><a href="">MY ORDER</a></li>
                </ul>

            </div>
            <div class="col-md-10">
                 <h2>Customer Password</h2>

                 <form action="{{route('update.customer.password')}}" method="POST" id="myfrom">
                    @csrf
                      <div class="form-group">
                      <label for="currentpassword">Current Password:</label>
                      <input type="password" class="form-control" id="currentpassword" placeholder="Enter password" name="currentpassword">
                      @if ($errors->has('currentpassword'))
                         <span class="text-danger">{{ $errors->first('currentpassword') }}</span>
                      @endif
                    </div>
                    <div class="form-group">
                        <label for="newpassword">New Password:</label>
                        <input type="password" class="form-control" id="newpassword" placeholder="Enter password" name="newpassword">
                        @if ($errors->has('newpassword'))
                           <span class="text-danger">{{ $errors->first('newpassword') }}</span>
                        @endif
                      </div>
                    <div class="form-group">
                        <label for="password2" class="col-form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm password">
                    </div>
        
                    <button type="submit" class="btn btn-success">Update Passowrd</button>
                  </form>

              
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
          $('#myfrom').validate({
            rules: {
              
             currentpassword: {
                required: true,
              },
              newpassword: {
                required: true,
              },
              password2: {
                required: true,
                equalTo :'#newpassword'
              }
            },
            messages: {
    
             newpassword: {
                required: "Please provide current password",
              },
              
              currentpassword: {
                required: "Please provide a password",
              },
    
              password2: {
                required: "Please provide confirm password",
                equalTo: "confirm password does not match"
              },
              
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
	
@endsection