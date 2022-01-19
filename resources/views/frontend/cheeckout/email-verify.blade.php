@extends('frontend.master')

@section('main-contant')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"  style="background-image:url({{asset('/upload/bg_image/funituretwo.png')}});">
            <h2 class="1text-105 c10 text-center">
                     Email varification form
            </h2>
    </section>
    <style type="text/css">
       
                #login .container #login-row #login-column .login-box {
                margin-top:50px;
                max-width: 600px;
                height: 320px;
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
                        <form id="login-form" class="form" action="{{route('varificationlogin')}}" method="post">
                         @csrf
                            <h3 class="text-center text-info">Email Verify</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">code:</label><br>
                                <input type="text" name="code" id="code" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
    $(document).ready(function () {
      $('#login-form').validate({
        rules: {
         
          email: {
            required: true,
            email: true,
          },
          phone: {
            required: true,
          },
        },
        messages: {
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          code: {
            required: "Please enter Your phone"
          }
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