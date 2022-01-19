@extends('frontend.master')

@section('main-contant')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"  style="background-image:url({{asset('/upload/bg_image/funituretwo.png')}});">
            <h2 class="1text-105 c10 text-center">
                         Product Details
            </h2>
    </section>
     <!-- Product -->
	 <!-- Product Detail -->
	 @if(session('message'))
	 <div class="alert alert-success" role="alert" width="400px">
	   {{Session::get('message')}}
	 </div>
	 @endif
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                           
                                
                                <div class="slick3 gallery-lb">
                                    @foreach ($subimage as $products)
                                        <div class="item-slick3" data-thumb="{{asset('/upload/subproduct_image/'.$products->sub_image)}}">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{asset('/upload/subproduct_image/'.$products->sub_image)}}" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('/upload/subproduct_image/'.$products->sub_image)}}">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                           

						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{$product->name}}
						</h4>

						<span class="mtext-106 cl2">
							{{$product->price}}
						</span>

						<p class="stext-102 cl3 p-t-23">
							{{$product->sort_desc}}
						</p>
						
						<!--  -->
						<div class="p-t-33">
						  <form method="post" action="{{route('insart.Card')}}">
							@csrf
							    <input type="hidden" name="id" value="{{$product->id}}"/>
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="size_id">
												<option>Select size</option>
												@foreach ($size as $sizes)
													<option value="{{$sizes->size_id}}">{{$sizes['size']['name']}}</option>
												@endforeach
												
											</select>
											<div class="dropDownSelect2"></div>
											@if ($errors->has('size_id'))
                                              <span class="text-danger">{{ $errors->first('size_id') }}</span>
									        @endif
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="color_id">
												<option>Select Color</option>
												@foreach ($color as $colors)	
												<option value="{{$colors->color_id}}">{{$colors['color']['name']}}</option>
												@endforeach
												
											</select>
											<div class="dropDownSelect2"></div>
											@if ($errors->has('color_id'))
										     <span class="text-danger">{{ $errors->first('color_id') }}</span>
									        @endif
										 </div>
										 
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>	
						  </form>
						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									{{$product->long_desc}}
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Catagory
											</span>

											<span class="stext-102 cl6 size-206">
                                                       {{$product['category']['name']}},
                                            </span>
										</li>


										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Brand
											</span>

											<span class="stext-102 cl6 size-206">
											    {{$product['brand']['name']}},
                                            </span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Color
											</span>

											<span class="stext-102 cl6 size-206">
												@foreach ($color as $item)
											        	{{$item['color']['name']}},
												@endforeach
												
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

											<span class="stext-102 cl6 size-206">
												@foreach ($size as $item)
											        	{{$item['size']['name']}},
												@endforeach
												
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		
	

	
@endsection