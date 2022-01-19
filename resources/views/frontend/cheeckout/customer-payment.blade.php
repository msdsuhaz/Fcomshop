@extends('frontend.master')

@section('main-contant')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image:url({{asset('/upload/bg_image/funituretwo.png')}});">
            <h2 class="1text-105 c10 text-center">
                        Payment method
            </h2>
    </section>
     <!-- Product -->
	<!-- Shoping Cart -->
	
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="wrap-table-shopping-cart">
						<table class="table table-bordered">
							<tr class="table_head">
								<th >Product</th>
								<th >Image</th>
								<th> size</th>
								<th >color</th>
								<th >Price</th>
								<th >Quantity</th>
								<th >Total</th>
								<th >Action</th>
							</tr>
                             @php
								$contant = Cart::content();
								$total =0;
							 @endphp
						    @foreach ($contant as $contants)
								<tr class="table_row">
									<td>{{$contants->name}}</td>
									<td ">
										<div class="how-itemcart1">
											<img src="{{asset('/upload/product_image/'.$contants->options->image)}}" alt="IMG">
										</div>
									</td>
									<td>{{$contants->options->size_name}}</td>
									<td>{{$contants->options->color_name}}</td>
									<td>{{$contants->price}}</td>
									<td>
									<form method="post" action="{{route('cart.update')}}">
									 @csrf
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<input class="mtext-104 cl3 txt-center num-product form-control sss" type="number" name="qty" id="qty" value="{{$contants->qty}}">
											<input type="hidden" name="rowId" id="rowId" value="{{$contants->rowId}}">
											<input type="submit" value="update" class="flex-c-m stext-101 c12 bg8 s888 hov-btn3 p-lr-15 trans-04 pinter m-tb-10">
										</div>
								   	</form>
									</td>
									<td >{{$contants->subtotal}}</td>
									<td >
										<a class="cart_quantity_delete btn btn-danger" href="{{route('delete.card',$contants->rowId)}}"></a>
									</td>
								</tr>
								@php
                                         $total += $contants->subtotal; 									
								@endphp
							    @endforeach

                                <tr>
                                    <td colspan="6" style="text-align: right;">Grand Totoal</td>
                                    <td colspan="2">{{$total}}</td>
                                </tr>
                                 
						</table>
					</div>
				</div>
			</div>
			@if(session('message'))
			<div class="alert alert-success text-right" role="alert" width="400px">
			  {{Session::get('message')}}
			</div>
			@endif
            <div class="row">
                <div class="col-md-4">
                    <h2>Select Payment Method</h2>
                </div>
                <div class="col-md-6">
                    <form action="{{route('payment.method')}}" method="post">
                        @csrf
						@foreach ($contant as $contants)
						   <input type="hidden" name="payment_id" value="{{$contants->id}}">
						@endforeach
                        <input type="hidden" name="order_total" value="{{$total}}" >
						@if ($errors->has('payment_method'))
                            <span class="text-danger">{{ $errors->first('payment_method') }}</span>
			            @endif
                       <select name="payment_method" id="payment_method"class="form-control">
                             <option value="">Select Payment Type</option>
                             <option value="Hand cash">Hand Cash</option>
                             <option value="bikas">Bikash</option>
                       </select>
					  
                       <div class="show_field" style="display: none;">
                             <span>Bikas No :01759333877</span>
                             <input type="text" name="transtaction_no" class="form-control" placeholder="Write Transaction No">
                       </div>

                           <button type="submit" class="btn btn-primary" style="margin-top:10px; ">Submit</button>
                    </form>
                </div>
            </div>
		</div>
	</div>

    <script type="text/javascript">
            $(document).on('change','#payment_method',function(){
                var payment_method = $(this).val();
                if(payment_method =='bikas') {
                    $('.show_field').show();
                }else{
                    $('.show_field').hide();
                }
            });

    </script>

@endsection