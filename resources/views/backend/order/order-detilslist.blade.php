@extends('backend.master')

@section('main-contant')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Approved Order</h1>
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
      @if(session('message'))
      <div class="alert alert-success" role="alert" width="400px">
        {{Session::get('message')}}
      </div>
      @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                 <h3>Order Details info
                 <a class="btn btn-success float-right"href="{{route('Approved.Order')}}"><i class="fa fa-list"></i></a>
                 </h3>
              </div>
              <div class="card-body ">
                <table class="txt-center my-table" width="100%" border="1px">

                    <tr>
                        <td width="30%">Billing Information:</td>
                        <td colspan="2" width="70%" style="text-align:left;">
                               <strong>Name:</strong>{{$orders['shipping']['name']}}</br>
                               <strong>Email:</strong>{{$orders['shipping']['email']}}</br>
                               <strong>Phone:</strong>{{$orders['shipping']['mobile_no']}}</br>
                               <strong>Address:</strong>{{$orders['shipping']['address']}}</br>
                               <strong>Payment:</strong>
                               {{$orders['payment']['payment_method']}}
                               @if($orders['payment']['payment_method']=='bikas')
                                    (Transaction Nomber:{{$orders['payment']['transtaction_no']}})
                               @endif
                               <span>Order NO:#{{$orders->order_no}}</span>
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
                                  <img src="{{asset('/upload/product_image/'.$order['product']['image'])}}" width="50px" height="50px" alt="">
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
                    @endforeach
                    <tr>
                        <td colspan="2" style="text-align: right;">Grand Total:</td>
                        <td><strong>{{$orders->order_total}}</strong></td>
                    </tr>
                   
          </table>
                
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
  <!-- /.content-wrapper -->
    
@endsection

