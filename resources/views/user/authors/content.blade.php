@extends('user.main')

@section('content')
<section class="product_content_area pt-40" style="padding: 40px;">
    <!-- start of page content -->
    <div class="lookcare-product-single container">
        <div class="row">
            <div class="main col-xs-12" role="main">
                <div class=" product">
                    <div class="row">
                        <div class="col-md-5 col-sm-6 summary-before ">
                            <div class="product-slider product-shop">
                                <ul class="slides">
                                    <li data-thumb="">
                                        <a href="" data-imagelightbox="gallery" class="hoodie_7_front">
                                            <img src="{{URL('storage/app/public/uploads-author/'.$author->author_thumb)}}"
                                                width="300" height="400" class="attachment-shop_single" alt="sach">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-7 product-review entry-summary">
                            <h1 class="product_title"> {{ $author->author_name }} </h1>
                            <p> {!! $author->author_description !!} </p>
                        </div>
                    </div>

                    <div class="wrapper-description">
                        <div class="tabs-container product-comments">
                            <div class="tab-content">
                                <section class="related-products">
                                    <h3 class="section-title"> Các tác phẩm của tác giả </h3>
                                    <div class="related-products-wrapper">
                                        <div class="related-products-carousel">
                                            <div class="product-control-nav">
                                                <a class="prev"><i class="fa fa-angle-left"></i></a>
                                                <a class="next"><i class="fa fa-angle-right"></i></a>
                                            </div>
                                            <div class="products-top"></div>
                                            <div class="row product-listing">
                                                <div id="product-carousel" class="product-listing">
                                                    @foreach($books as $book)
                                                    <div class="product  item first ">
                                                        <article>
                                                            <figure>
                                                                <a href="{{URL('sach/'.$book->book_id.'.html')}}">
                                                                    <img src="{{URL('storage/app/public/uploads-book/'.$book->book_thumb)}}"
                                                                        class="img-responsive" width="100%" height="220"
                                                                        alt="sach">
                                                                </a>
                                                                <figcaption><span class="amount">
                                                                        {{ number_format($book->book_price_sale) . ' VNĐ' }}
                                                                    </span></figcaption>
                                                            </figure>

                                                            <h5 class="title"><a href="#"> </a></h5>

                                                            <a href="{{URL('sach/'.$book->book_id.'.html')}}">
                                                                {{ $book->book_name }} </a>
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
                </div>
                <!-- #product-293 -->
            </div>
            <!-- end of main -->
        </div>
        <!-- end of .row -->
    </div>
    <!-- end of page content -->
</section>
@endsection