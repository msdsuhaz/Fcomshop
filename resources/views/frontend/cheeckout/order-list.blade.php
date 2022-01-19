@extends('frontend.master')

@section('main-contant')

<style type="text/css">
    .prof{
        margin-right: 5px;
    }
    .prof li{
        background: #1781bf;
        padding:5px;
        margin: 10px;
        padding-right: 10px;
        border-radius: 11px;
        width:190px;
  
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
                      Order List
            </h2>
    </section>
 	<!-- checkout -->

     <section class="about_us">
         <div class="container">
            
           <div class="row" style="padding:20px 2px 20px 2px">
             <div class="col-md-2" >
                <ul class="prof">
                    <li><a href="{{route('deshbord')}}">MY PROFILE</a></li>
                    <li><a href="{{route('change.customer.password')}}">PASSWORD CHANGE</a></li>
                    <li><a href="">MY ORDER</a></li>
                </ul>

              </div>
               <div class="col-md-9">
                     <table class="table table-bordered">
                         <thead>
                               <tr>
                                   <th>Order No</th>
                                   <th>Total Amount</th>
                                   <th>payment type</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                         </thead>
                         <tbody>
                             @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->order_no}}</td>
                                        <td>{{$order->order_total}}</td>
                                        <td>
                                            {{$order['payment']['payment_method']}}
                                            @if($order['payment']['payment_method'] =='bikas')
                                                (Transaction Number:{{$order['payment']['transtaction_no']}});
                                            @endif
                                        </td>
                                        <td>
                                            @if($order->status=='0')
                                                <span>Unapproverd</span>
                                            @elseif($order->status=='1')
                                               <span>Unapproverd</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('Order.Customer.Details',$order->id)}}" class="btn btn-primary btn-sm" style="color:#fff;"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('Order.Customer.print',$order->id)}}" class="btn btn-primary btn-sm" style="color:#fff;"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                             @endforeach
                               
                         </tbody>

                     </table>
               </div>
           </div>
        </div>
     </section>
	
@endsection