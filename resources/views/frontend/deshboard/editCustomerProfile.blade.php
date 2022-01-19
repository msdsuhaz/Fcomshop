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
                 <h2>Customer Edit Profile</h2>

                 <form id="login-form" action="{{route('customer.profile.update')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
                       <div class="col-md-4">
                           <label>Full Name</label>
                           <input type="text" name="name"  value="{{$editData->name}}"class="form-control">
                           <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                       </div>
                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="email" name="email" value="{{$editData->email}}"class="form-control">
                            <font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                        </div>
                        <div class="col-md-4">
                           <label>Mobile No</label>
                           <input type="text" name="phone" value="{{$editData->phone}}"class="form-control">
                           <font color="red">{{($errors->has('phone'))?($errors->first('phone')):''}}</font>
                        </div>
                        <br><br>
                        <div class="col-md-4">
                            <label>Address</label>
                            <input type="text" name="address" value="{{$editData->address}}"class="form-control">
                            <font color="red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                         </div>
                         <div class="col-md-4">
                            <label>Gander</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male {{($editData->gender=='Male')?"selected":""}}">Male</option>
                                <option value="Famale {{($editData->gender=='Famale')?"selected":""}}">Female</option>
                                <font color="red">{{($errors->has('gender'))?($errors->first('gender')):''}}</font>
                            </select>
                         </div>
                         <div class="col-md-4">
                            <label>Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <font color="gender">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                         </div>
                         <div class="col-md-4">
                            <img  id="showImage" style="width: 300px" src="{{(!empty($editData->image))?asset('/upload/user_image/'.$editData->image):asset('/upload/no_image.png')}}">
                         </div>
                         <div class="col-md-4"style="margin-top:60px;">
                             <button type="submit" class="btn btn-primary">Update Profile</button>
                         </div>
                   </div>

                 </form>
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
              }
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