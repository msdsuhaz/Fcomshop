@extends('frontend.master')

@section('main-contant')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"  style="background-image:url({{asset('/upload/bg_image/funituretwo.png')}});">
            <h2 class="1text-105 c10 text-center">
                        Registration Caustomer
            </h2>
    </section>
    <style type="text/css">
       
                #login .container #login-row #login-column .login-box {
                margin-top:50px;
                max-width: 600px;
                margin-bottom: 70px;
                border: 1px solid #9C9C9C;
                background-image: linear-gradient(to bottom, #aec1c3, #a9b5b7, #bcc5c6, #cfd5d5, #e3e5e5);
                }
                #login .container #login-row #login-column .login-box #login-form {
                padding: 20px;
                }
                #login .container #login-row #login-column .login-box #login-form #register-link {
                margin-top: -85px;
    </style>
	 @if(session('message'))
	 <div class="alert alert-success" role="alert" width="400px">
	   {{Session::get('message')}}
	 </div>
     @endif
     <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div class="login-box col-md-12">
                          <form action="{{route('register.store')}}" method="POST" id="login-form" >
                            @csrf
                            <h3 class="text-center text-info">Registration form</h3>
                            <div class="form-group">
                                <label for="Fullname" class="text-info">FullName:</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                                <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                                
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                                <font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="text-info">Phone:</label><br>
                                <input type="text" name="phone" id="phone" class="form-control">
                                <font color="red">{{($errors->has('phone'))?($errors->first('phone')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <font color="red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Confirmation Password:</label><br>
                                <input type="password" name="confirmation_password" id="confirmation_password" class="form-control">
                                <font color="red">{{($errors->has('confirmation_password'))?($errors->first('confirmation_password')):''}}</font>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="SignUp">
                                <span style="color: aqua">If you sginUp? you can login here</span> <a href="{{route('castomer.login')}}" class="text-info">Login here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
 
<script type="text/javascript">
    $(document).ready(function () {
      $('#login-form').validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          phone: {
            required: true,
          },
          password: {
            required: true,
            minlength:9
          },
          confirmation_password: {
            required: true,
            equalTo:'#password'
          },
        },
        messages: {
          name: {
            required: "Please enter user name"
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          phone: {
            required: "Please enter Your phone"
          },
          password: {
            required: "Please enter Your password"
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