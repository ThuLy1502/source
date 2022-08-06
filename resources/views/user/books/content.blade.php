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
                                <span class="onsale"> Giảm giá!</span>
                                <ul class="slides">
                                    <li data-thumb="">
                                        <a href="" data-imagelightbox="gallery" class="hoodie_7_front">
                                            <img src="{{URL('storage/app/public/uploads-book/'.$book->book_thumb)}}"
                                                width="300" height="400" class="attachment-shop_single" alt="sach">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-7 product-review entry-summary">
                            <h1 class="product_title"> {{ $book->book_name }} </h1>

                            <div>
                                <p class="price"><del><span
                                            class="amount">{{ number_format($book->book_price) . ' VNĐ' }}</span></del>
                                    <ins><span class="amount"> {{ number_format($book->book_price_sale) . ' VNĐ' }}
                                        </span></ins>
                                </p>
                            </div>

                            <?php $sum = 0; ?>
                            @foreach($authors as $author)
                            	<?php $sum++ ?>
                            @endforeach

                            <div class="product_meta">
                                <span class="sku_wrapper">Tác giả:
                                    <span class="sku">
                                        <?php $dem = 0; ?>
                                        @foreach($authors as $author)
											<a href="{{URL('tac-gia/' . $author->author_id . '.html')}}" rel="tag"> {{ $author->author_name }} </a>
											<?php
											$dem++;
											if ($sum > $dem) { ?> 
												- 
											<?php } else { ?> 
												. 
											<?php } ?>
                                        @endforeach
                                    </span>
                                </span>

                                <span class="posted_in">Danh mục: <a href="{{URL('danh-muc/' . $book->menu_id. '.html')}}" rel="tag">
                                        {{ $book->menu->menu_name }} </a> . </span>
                                <span class="posted_in">Nhà xuất bản: <a href="{{URL('nha-xuat-ban/' . $book->publisher_id. '.html')}}" rel="tag">
                                        {{ $book->publisher->publisher_name }} </a> . </span>

                                <span class="posted_in">Khổ sách: <a href="#" rel="tag"> {{ $book->book_format }} </a>
                                    cm</span>
                                <span class="posted_in">Số trang: <a href="#" rel="tag"> {{ $book->book_pages }} </a>
                                    trang</span>
                                <span class="posted_in">Trọng lượng: <a href="#" rel="tag"> {{ $book->book_weight }} </a>
                                    g</span>
                                <span class="posted_in">Năm xuất bản: <a href="#" rel="tag">
                                        {{ $book->book_publishing_year }} </a> </span>
                            </div>
                        </div>
                        <!-- .summary -->

                    </div>

                    <div class="wrapper-description">

                        <ul class="tabs-nav clearfix">
                            <li class="active"> Tóm tắt nội dung </li>
                        </ul>
                        <div class="tabs-container product-comments">

                            <div class="tab-content">
                                <section class="related-products">

                                    <p>
                                        {!! $book->book_description !!}
                                    </p>

                                    <h3 class="section-title"> Sách cùng thể loại </h3>
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
                                                                <a href="{{URL('sach/' . $book->book_id . '.html')}}">
                                                                    <img src="{{URL('storage/app/public/uploads-book/'.$book->book_thumb)}}"
                                                                        class="img-responsive" width="100%" height="220"
                                                                        alt="sach">
                                                                </a>
                                                                <figcaption><span class="amount">
                                                                        {{ number_format($book->book_price_sale) . ' VNĐ' }}
                                                                    </span></figcaption>
                                                            </figure>

                                                            <h5 class="title"><a href="#"> </a></h5>

                                                            <a href="{{URL('sach/' . $book->book_id . '.html')}}">
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
            </div>
        </div>
    </div>
</section>
@endsection