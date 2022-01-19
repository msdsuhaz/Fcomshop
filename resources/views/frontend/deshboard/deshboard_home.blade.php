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
                <div class="row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8">
                         <div class="card">
                             <div class="card-body">
                                 <div class="image-circale text-center">
                                     <img style="width:130px; border-radius:100px;"src="{{(!empty($user->image))?asset('/upload/user_image/'.$user->image):asset('/upload/no_image.png')}}" alt="customer profile picture"/>
                                 </div>
                                 <h3 class="text-center">{{$user->name}}</h3>
                                 <p class="text-center">{{$user->address}}</p>
                                 <table class="table table-bordered">
                                     <tbody>
                                         <tr>
                                             <td>Mobile No</td>
                                             <td>{{$user->phone}}</td>
                                         </tr>
                                         <tr>
                                            <td>Email</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>{{$user->gender}}</td>
                                        </tr>
                                     </tbody>

                                 </table>
                                 <a href="{{route('customer.profile.edit')}}" class="btn btn-primary btn-block">Edit Profile</a>
                             </div>
                         </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

	
@endsection