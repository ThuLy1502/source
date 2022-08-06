@extends('main')

@section('content')
<!-- new collection directory -->
<section id="content-block" class="slider_area">
    <div class="container">
        <div class="content-push">
            <div class="row">

                <div class="col-md-3 col-md-push-9">
                    <div class="sidebar-navigation">
                        <div class="title"> Danh Mục Sách<i class="fa fa-angle-down"></i></div>
                        <div class="list">
                            @foreach($menus as $menu)
                            <a class="entry" href="#"><span><i class="fa fa-angle-right"></i> {{ $menu->name}}
                                </span></a>
                            @endforeach
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="col-md-9 col-md-pull-3">

                <div class="header_slider">
                        <article class="boss_slider">
                            <div class="tp-banner-container">
                                <div class="tp-banner tp-banner0">
                                    <ul>
                                        <!-- SLIDE  -->
                                        <li data-link="#" data-target="_self" data-transition="flyin"
                                            data-slotamount="7" data-masterspeed="500" data-saveperformance="on">
                                            <!-- MAIN IMAGE --><img src="{{('public/users/img/dummy.png')}}"
                                                alt="slidebg1"
                                                data-lazyload="{{('public/users/img/sach-moi-tu-nguyen.jpg')}}"
                                                data-bgposition="left center" data-kenburns="off" data-duration="14000"
                                                data-ease="Linear.easeNone" data-bgpositionend="right center" />
                                            <!-- LAYER NR. 1 -->
                                            <div class="tp-caption very_big_white randomrotate customout rs-parallaxlevel-0"
                                                data-x="270" data-y="140"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="500" data-end="4800" data-endspeed="300"
                                                data-easing="easeInOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                Trendy </div>
                                            <!-- LAYER NR. 2 -->
                                            <div class="tp-caption very_large_white_text randomrotate customout rs-parallaxlevel-0"
                                                data-x="270" data-y="250"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="800" data-end="4800" data-endspeed="300"
                                                data-easing="easeInOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                selection </div>
                                            <!-- LAYER NR. 3 -->
                                            <div class="tp-caption large_white_text randomrotate customout rs-parallaxlevel-0"
                                                data-x="355" data-y="363"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="1200" data-end="4800" data-endspeed="300"
                                                data-easing="easeInOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                SHOP NOW </div>

                                        </li>
                                        <li data-link="#" data-target="_self" data-transition="3dcurtain-horizontal"
                                            data-slotamount="7" data-masterspeed="500" data-saveperformance="on">
                                            <!-- MAIN IMAGE --><img src="public/users/img/dummy.png" alt="slidebg1"
                                                data-lazyload="{{('public/users/img/sach-moi-tu-nguyen.jpg')}}"
                                                data-bgposition="left center" data-kenburns="off" data-duration="14000"
                                                data-ease="Linear.easeNone" data-bgpositionend="right center" />
                                            <!-- LAYER NR. 1 -->
                                            <div class="tp-caption very_big_white fade customout rs-parallaxlevel-0"
                                                data-x="270" data-y="140"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="500" data-end="4800" data-endspeed="300"
                                                data-easing="easeOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                Trendy </div>
                                            <!-- LAYER NR. 2 -->
                                            <div class="tp-caption very_large_white_text fade customout rs-parallaxlevel-0"
                                                data-x="270" data-y="250"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="800" data-end="4800" data-endspeed="300"
                                                data-easing="easeOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                selection </div>
                                            <!-- LAYER NR. 3 -->
                                            <div class="tp-caption large_white_text fade customout rs-parallaxlevel-0"
                                                data-x="355" data-y="363"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="1200" data-end="4800" data-endspeed="300"
                                                data-easing="easeOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                SHOP NOW </div>
                                        </li>
                                        <li data-transition="boxslide" data-slotamount="7" data-masterspeed="500"
                                            data-saveperformance="on">
                                            <!-- MAIN IMAGE --><img src="img/dummy.png" alt="slidebg1"
                                                data-lazyload="{{('public/users/img/sach-moi-tu-nguyen.jpg')}}"
                                                data-bgposition="left center" data-kenburns="off" data-duration="14000"
                                                data-ease="Linear.easeNone" data-bgpositionend="right center" />
                                            <!-- LAYER NR. 1 -->
                                            <div class="tp-caption large_white_text skewfromleftshort customout rs-parallaxlevel-0"
                                                data-x="355" data-y="363"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="1200" data-end="4800" data-endspeed="300"
                                                data-easing="easeOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                SHOP NOW </div>
                                            <!-- LAYER NR. 2 -->
                                            <div class="tp-caption very_large_white_text skewfromleftshort customout rs-parallaxlevel-0"
                                                data-x="270" data-y="250"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="800" data-end="4800" data-endspeed="300"
                                                data-easing="easeOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                selection </div>
                                            <!-- LAYER NR. 3 -->
                                            <div class="tp-caption very_big_white skewfromleftshort customout rs-parallaxlevel-0"
                                                data-x="270" data-y="140"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="500" data-end="4800" data-endspeed="300"
                                                data-easing="easeOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                Trendy </div>
                                        </li>
                                    </ul>
                                    <div class="slideshow_control"></div>
                                </div><!-- /.tp-banner -->
                            </div>
                        </article>
                    </div><!-- /.header_slider -->

                    <div class="clear"></div>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- end new collection directory -->



<section class="men_area pt-40">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-lg-12">
						<div class="kat-shoe-bg imgframe6">
							<img src="img/large-banner-4.png" alt="" />
						</div>
					</div>
				</div>

				<div class="product-filter">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2">
							<h5 class="control-label">Sort By:</h5>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4">
							<select name="price-type" id="input-sort" class="form-control">
								<option value="">Default</option>
								<option value="">Name (A - Z)</option>
								<option value="">Name (Z - A)</option>
								<option value="">Price (Low > High)</option>
								<option value="">Price (High > Low)</option>
								<option value="">Rating (Lowest)</option>
							</select>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2">
							<h5 class="control-label">Show:</h5>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2">
							<select name="value" id="input-sort-name" class="form-control">
								<option value="">6</option>
								<option value="">25</option>
								<option value="">30</option>
								<option value="">40</option>
								<option value="">20</option>
								<option value="">28</option>
							</select>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-2">
							<div class="button-view">
								<a  href="#"><i class="fa fa-th-list"></i></a>
								<a class="special_color" href="#"><i class="fa fa-th"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div id="shop-all" class="row">
                    @foreach($books as $book)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-md-3 product-item filter-best">
                            <div class="product-img">
                                <img src="{{URL('storage/app/public/uploads/'.$book->thumb)}}" alt="product" width="250" height="300">
                                <div class="product-hover">
                                    <div class="product-cart">
                                        <a class="btn btn-secondary btn-block" href="#"> Chi tiết </a>
                                    </div>
                                </div>
                            </div>
                            <!-- .product-img end -->
                            <div class="product-bio">
                                <h4>
                                    <a href="#"> {{ $book->name }} </a>
                                </h4>
                                <p class="product-price"> {{ number_format($book->price_sale) . ' VNĐ' }} </p>
                            </div>
                            <!-- .product-bio end -->

                        </div>
                    @endforeach
				</div>




			</div>

	</div>
</section>


<div class="bt-block-home-parallax" style="background-image: url(img/resource/parallax2.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="lookbook-product">
                    <h2><a href="#" title="">Collection 2016 </a></h2>
                    <ul class="simple-cat-style">
                        <li><a href="#" title="">Dresses</a></li>
                        <li><a href="#" title="">Coats & Jackets</a></li>
                        <li><a href="#" title="">Jeans</a></li>
                    </ul>
                    <a href="#" title="">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.bt-block-home-parallax -->

<!-- Start Our Clients -->

<section id="Clients" class="light-wrapper">
    <div class="container inner">
        <div class="row">
            <div class="Last-items-shop col-md-3 col-sm-6">

                <!-- Block heading two -->
                <div class="block-heading-two block-heading-three">
                    <h3><span>Tin tức</span></h3>
                </div>
                <!--<div class="Top-Title-SideBar">
						<h3>Special Offer</h3>
					</div>-->
                <div class="Last-post">
                    <ul class="shop-res-items">
                        <li>
                            <a href="#"><img src="img/small/56.jpg" alt=""></a>
                            <h6><a href="#">Tin tức số 1</a></h6>
                            <span class="sale-date">Hot</span>
                        </li>
                        <li>
                            <a href="#"><img src="img/small/57.jpg" alt=""></a>
                            <h6><a href="#">Tin tức số 2</a></h6>
                            <span class="sale-date">Hot</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="Last-items-shop col-md-3 col-sm-6">
                <!-- Block heading two -->
                <div class="block-heading-two block-heading-three">
                    <h3><span> &nbsp; </span></h3>
                </div>
                <!--<div class="Top-Title-SideBar">
						<h3>Best Sellers</h3>
					</div>-->
                <div class="Last-post">
                    <ul class="shop-res-items">
                        <li>
                            <a href="#"><img src="img/small/56.jpg" alt=""></a>
                            <h6><a href="#">Tin tức số 3</a></h6>
                            <span class="sale-date">Hot</span>
                        </li>
                        <li>
                            <a href="#"><img src="img/small/57.jpg" alt=""></a>
                            <h6><a href="#">Tin tức số 4</a></h6>
                            <span class="sale-date">Hot</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="Last-items-shop col-md-3 col-sm-6">
                <!-- Block heading two -->
                <div class="block-heading-two block-heading-three">
                    <h3><span> &nbsp;</span></h3>
                </div>
                <!--<div class="Top-Title-SideBar">
						<h3>Featured</h3>
					</div>-->
                <div class="Last-post">
                    <ul class="shop-res-items">
                        <li>
                            <a href="#"><img src="img/small/56.jpg" alt=""></a>
                            <h6><a href="#">Tin tức số 5</a></h6>
                            <span class="sale-date">Hot</span>
                        </li>
                        <li>
                            <a href="#"><img src="img/small/57.jpg" alt=""></a>
                            <h6><a href="#">Tin tức số 6</a></h6>
                            <span class="sale-date">Hot</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="Last-items-shop col-md-3 col-sm-6">
                <!-- Block heading two -->
                <div class="block-heading-two block-heading-three">
                    <h3><span> &nbsp; </span></h3>
                </div>
                <!--<div class="Top-Title-SideBar">
						<h3>Sales</h3>
					</div>-->
                <div class="Last-post">
                    <ul class="shop-res-items">
                        <li>
                            <a href="#"><img src="img/small/56.jpg" alt=""></a>
                            <h6><a href="#">Tin tức số 7</a></h6>
                            <span class="sale-date">Hot</span>
                        </li>
                        <li>
                            <a href="#"><img src="img/small/57.jpg" alt=""></a>
                            <h6><a href="#">Tin tức số 8</a></h6>
                            <span class="sale-date">Hot</span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- End Our Clients  -->
@endsection