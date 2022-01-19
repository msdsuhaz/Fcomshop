@extends('frontend.master')

@section('main-contant')

<style type="text/css">
    .prof li{
        background: #1781bf;
        padding: 5px;
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
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image:url({{asset('/upload/bg_image/funituretwo.png')}});">
            <h2 class="1text-105 c10 text-center">
                      Checkout 
            </h2>
    </section>
 	<!-- checkout -->

     <section class="about_us">
         <div class="container">
            
           <div class="row" style="padding:20px 0px 20px 0px">
             <div class="col-md-2" >
                <ul class="prof">
                    <li><a href="{{route('deshbord')}}">MY PROFILE</a></li>
                    <li><a href="{{route('change.customer.password')}}">PASSWORD CHANGE</a></li>
                    <li><a href="">MY ORDER</a></li>
                </ul>

              </div>
               <div class="col-md-10">
                     <h2>Customer Form</h2>
                     <form method="post" action="{{route('checkout.store')}}" >
                        @csrf
                         <div class="row">
                             <div class="col-md-6">
                                 <label >Full Name</label>
                                 <input type="text" name="name" class="form-control">
                                
                             </div>
                             <div class="col-md-6">
                                <label >Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label >Mobile No</label>
                                <input type="text" name="mobile_no" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label >Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="col-md-6" style="margin-top: 30px;">
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                         </div>
                     </form>
               </div>
           </div>
        </div>
     </section>
	
@endsection