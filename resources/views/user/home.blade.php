@extends('user.main')

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
                            @foreach($menus_parent_id as $menu)
                            <a class="entry" href="{{URL('danh-muc/'.$menu->menu_id.'.html')}}"><span><i
                                        class="fa fa-angle-right"></i> {{ $menu->menu_name}}
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
                                            <!-- MAIN IMAGE --><img src=" {{('public/users/img/dummy.png')}} "
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
                                                BOOK </div>
                                            <!-- LAYER NR. 2 -->
                                            <div class="tp-caption very_large_white_text randomrotate customout rs-parallaxlevel-0"
                                                data-x="270" data-y="250"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="800" data-end="4800" data-endspeed="300"
                                                data-easing="easeInOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                WEBSITE </div>
                                            <!-- LAYER NR. 3 -->
                                            <div class="tp-caption large_white_text randomrotate customout rs-parallaxlevel-0"
                                                data-x="355" data-y="363"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="1200" data-end="4800" data-endspeed="300"
                                                data-easing="easeInOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                XEM NGAY </div>

                                        </li>
                                        <li data-link="#" data-target="_self" data-transition="3dcurtain-horizontal"
                                            data-slotamount="7" data-masterspeed="500" data-saveperformance="on">
                                            <!-- MAIN IMAGE --><img src="public/users/img/dummy.png" alt="slidebg1"
                                                data-lazyload="{{('public/users/img/sach moi_sw-02.jpg')}}"
                                                data-bgposition="left center" data-kenburns="off" data-duration="14000"
                                                data-ease="Linear.easeNone" data-bgpositionend="right center" />
                                            <!-- LAYER NR. 1 -->
                                            <div class="tp-caption very_big_white fade customout rs-parallaxlevel-0"
                                                data-x="270" data-y="140"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="500" data-end="4800" data-endspeed="300"
                                                data-easing="easeOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                BOOK </div>
                                            <!-- LAYER NR. 2 -->
                                            <div class="tp-caption very_large_white_text fade customout rs-parallaxlevel-0"
                                                data-x="270" data-y="250"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="800" data-end="4800" data-endspeed="300"
                                                data-easing="easeOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                WEBSITE </div>
                                            <!-- LAYER NR. 3 -->
                                            <div class="tp-caption large_white_text fade customout rs-parallaxlevel-0"
                                                data-x="355" data-y="363"
                                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                data-speed="300" data-start="1200" data-end="4800" data-endspeed="300"
                                                data-easing="easeOutBack" data-endeasing="easeOutBack"
                                                data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;">
                                                XEM NGAY </div>
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



<section id="popular-product" class="ecommerce">
    <div class="container">
        <!-- Shopping items content -->
        <div class="shopping-content">

            <!-- Block heading two -->
            <div class="block-heading-two">
                <h3><span> Tất cả sách </span></h3>
            </div>

            <div class="row">
                @foreach($books as $book)
                <div class="col-md-3 col-sm-6">
                    <!-- Shopping items -->
                    <div class="shopping-item">

                        <form>
                            @csrf
                            <!-- Image -->
                            <a href="#" id="{{ $book->book_id }}" class="xemnhanh" data-toggle="modal"
                                data-target="#exampleModalCenter"><img class="img-responsive"
                                    src="{{URL('storage/app/public/uploads-book/'.$book->book_thumb)}}" alt=""
                                    width="90" height="120" /></a>

                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1"
                                role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <a href="#"><img class="img-responsive"
                                                                src="{{URL('storage/app/public/uploads-book/'.$book->book_thumb)}}"
                                                                alt="" width="160" height="200" /></a>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <h3 style="color: #32c8de;" id="book_name"></h3>
                                                        <div> Khổ sách: <span style="font-weight: bold; line-height: 1.8;" id="book_format"></span> cm.</div>
                                                        <div> Số trang: <span style="font-weight: bold; line-height: 1.8;" id="book_pages"></span> trang.</div>
                                                        <div> Trọng lượng: <span style="font-weight: bold; line-height: 1.8;" id="book_weight"></span> g.</div>
                                                        <div> Năm xuất bản: <span style="font-weight: bold; line-height: 1.8;" id="book_publishing_year"></span>.</div>
                                                        <div style="font-weight: bold; line-height: 1.8;"> Giới thiệu tóm tắt: </div>
                                                        <div id="book_description"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal"> Đóng </button>
                                            <a href="{{URL('sach/'.$book->book_id. '.html')}}" class="btn btn-primary"> Xem chi tiết </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <!-- Shopping item name / Heading -->
                        <h4 class="name-style"><a href="{{URL('sach/'.$book->book_id. '.html')}}">
                                {{ $book->book_name }} </a><span class="color pull-right">
                                {{ number_format($book->book_price_sale) . ' VNĐ' }} </span>
                        </h4>
                        <div class="clearfix"></div>
                        <!-- Buy now button -->
                        <div class="visible-xs">
                            <a class="btn btn-color btn-sm" href="#">Buy Now</a>
                        </div>
                        <!-- Shopping item hover block & link -->
                        <div class="item-hover bg-color hidden-xs">
                            <a href="{{URL('sach/'.$book->book_id. '.html')}}"> Chi tiết </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            {{ $books->links('user.paginate') }}
            <!-- Pagination end-->

        </div>
</section>


<!-- Start Our Shop Items -->

<!-- Recent items Starts -->
<section id="recent-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="related-products">

                    <!-- Block heading two -->
                    <div class="block-heading-two">
                        <h3><span> Tác giả </span></h3>
                    </div>

                    <div class="related-products-wrapper">
                        <div class="related-products-carousel">
                            <div class="product-control-nav">
                                <a class="prev"><i class="fa fa-angle-left"></i></a>
                                <a class="next"><i class="fa fa-angle-right"></i></a>
                            </div>

                            <div class="row product-listing">
                                <div id="product-carousel" class="product-listing">
                                    @foreach($authors as $key => $author)
                                    <div class="product  item first ">
                                        <article>
                                            <figure>
                                                <a href="{{URL('tac-gia/'. $author->author_id . '.html')}}">
                                                    <img src="{{URL('storage/app/public/uploads-author/' . $author->author_thumb)}} "
                                                        class="img-responsive " alt="tac-gia">
                                                </a>
                                            </figure>

                                            <h5 class="title"><a href="#"> </a></h5>

                                            <a href="#">{{ $author->author_name }}</a>
                                        </article>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    </div>
</section>

<section id="popular-product" class="ecommerce">
    <div class="container">
        <!-- Shopping items content -->
        <div class="shopping-content">

            <!-- Block heading two -->
            <div class="block-heading-two">
                <h3><span> Tin tức </span></h3>
            </div>

            <div class="row">
                @foreach($news as $key => $new)
                <div class="col-md-3 col-sm-6">
                    <!-- Shopping items -->
                    <div class="shopping-item" style="height: auto;">
                        <!-- Image -->
                        <a href="{{URL('tin-tuc/' . $new->new_id . '.html')}}"><img class="img-responsive"
                                src="{{URL('storage/app/public/uploads-new/'.$new->new_thumb)}}" class="img-responsive"
                                width="100%" height="150" alt="" /></a>
                        <!-- Shopping item name / Heading -->
                        <h4><a href="{{URL('tin-tuc/' . $new->new_id . '.html')}}"> Tiêu đề: {{ $new->new_title}} </a>
                        </h4>
                        <div class="clearfix"></div>
                        <!-- Shopping item hover block & link -->
                        <div class="item-hover bg-color hidden-xs">
                            <a href="{{URL('tin-tuc/' . $new->new_id . '.html')}}"> Xem thêm </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div style="padding: 20px;">
            </div>
            <!-- Pagination end-->
        </div>
    </div>
</section>

<!-- End Our Clients  -->
@endsection