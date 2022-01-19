<!DOCTYPE html>
<html>
<head>
            <meta charset="utf-8" />
            <title>order print</title>
</head>
            <body>
                 <center>
                <table class=" my-table" width="40px" >
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
                </center>
            </body>
</html>