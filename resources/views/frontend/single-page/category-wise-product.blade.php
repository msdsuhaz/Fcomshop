@extends('frontend.master')

@section('main-contant')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image:url({{asset('/upload/bg_image/funituretwo.png')}});">
            <h2 class="1text-105 c10 text-center">
                         Category Wise Product
            </h2>
    </section>
 	<!-- Product -->
	 <section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<a href="{{route('product.list')}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</a>
                   @foreach ($category as $categorys)
                        <a href="{{route('category-wise-product',$categorys->category_id)}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
						    {{$categorys['category']['name']}}
						</a> 
				   @endforeach
					

				</div>

				
				<!-- Filter -->
				<div class="dis-none panel-filter w-full">
					<div class="wrap-filter flex-w w-full" style="background-color: #858585;">
				        <div>
				            <div style="padding: 20px; font-size: 25px; color: #fff">
				                Brands
				            </div>
							<div style="padding: 0px 20px 20px 20px;">
								@foreach ($brand as $brands)
									<a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="{{route('brand-wise-product',$brands->brand_id)}}" class="filter-link stext-106 trans-04" style="color: #fff">
									   {{$brands['brand']['name']}}
									</a>
								@endforeach
				               
				            </div>
				        </div>
				    </div>
				</div>
			</div>

			<div class="row isotope-grid">
				@foreach ($product as $item)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{asset('/upload/product_image/'.$item->image)}}" alt="IMG-PRODUCT">

							<a href="{{route('productDetails',$item->slug)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
								Add to Card
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$item->name}}
								</a>

								<span class="stext-105 cl3">
									{{$item->price}}.Tk
								</span>
							</div>

						</div>
					</div>
				</div>	
				
				@endforeach
			</div>
		</div>
	</section>

	
@endsection