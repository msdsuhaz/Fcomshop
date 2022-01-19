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

    .my-table tr td{
                padding: 10px;
    }
    .my-table img {
        width: 50px;
        height: 50px;

    }
 </style>  
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image:url({{asset('/upload/bg_image/funituretwo.png')}});">
            <h2 class="1text-105 c10 text-center">
                      Order Detais
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
              <div class="col-md-10">

                    <table class="txt-center my-table" width="100%" border="1px">
                              <tr>
                                  <td width="30px">
                                    <img src="{{asset('/upload/logo_image/'.$logo->image)}}" alt="IMG-LOGO">
                                  </td>
                                  <td width="40px">
                                        <h2>Furniture Shop</h2>
                                        <span><strong>Mobile No</strong>{{$contact->mobile}}</span><br/>
                                        <span><strong>Email</strong>{{$contact->email}}</span><br/>
                                        <span>{{$contact->address}}</span>
                                  </td>
                                  <td width="30px">
                                          <span>Order NO:#{{$orders->order_no}}</span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>Billing Information:</td>
                                  <td colspan="2" style="text-align: left;">
                                         <strong>Name:</strong>{{$orders['shipping']['name']}}</br>
                                         <strong>Email:</strong>{{$orders['shipping']['email']}}</br>
                                         <strong>Phone:</strong>{{$orders['shipping']['mobile_no']}}</br>
                                         <strong>Address:</strong>{{$orders['shipping']['address']}}</br>
                                         <strong>Payment:</strong>
                                         {{$orders['payment']['payment_method']}}
                                         @if($orders['payment']['payment_method']=='bikas')
                                              (Transaction Nomber:{{$orders['payment']['transtaction_no']}})
                                         @endif
                                        
                                        </br>
                                  </td>
                              </tr>
                              <tr>
                                  <td colspan="3">Order Details</td>
                              </tr>
                              <tr>
                                   <td><strong>Product and Image</strong></td>
                                   <td><strong>Color and size</strong></td>
                                   <td><strong>Quantity and price</strong></td>
                              </tr>
                              @foreach ($orders['orderDetails'] as $order)
                                  <tr>
                                       <td>
                                            <img src="{{asset('/upload/product_image/'.$order['product']['image'])}}" alt="">
                                            <span>{{$order['product']['name']}}</span>
                                       </td>
                                       <td>
                                             <span>{{$order['color']['name']}} & {{$order['size']['name']}}</span>
                                       </td>
                                       <td>
                                           @php
                                               $sub_totall =$order->quantity*$order['product']['price'];
                                           @endphp
                                           <span>{{$order->quantity}} X {{$order['product']['price']}}</span>
                                           ={{$sub_totall}}

                                       </td>
                                  </tr>

                                  <tr>
                                      <td colspan="2" style="text-align: right;">Grand Total:</td>
                                      <td><strong>{{$orders->order_total}}</strong></td>
                                  </tr>
                              @endforeach
                             
                    </table>

              </div>
                     
     </section>
	
@endsection